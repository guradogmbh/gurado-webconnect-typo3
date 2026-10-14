<?php
declare(strict_types=1);

namespace Gurado\Webconnect\DataProcessing;

use TYPO3\CMS\Core\Page\AssetCollector;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

final class WidgetProcessor implements DataProcessorInterface
{
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData): array
    {
        $data = $processedData['data'] ?? [];
        $shop = trim((string)($data['tx_gurado_shop'] ?? ''));
        if ($shop === '') {
            $processedData['widgetHtml'] = '';
            return $processedData;
        }
        $mode = in_array($data['tx_gurado_mode'] ?? '', ['bubble', 'embedded'], true) ? $data['tx_gurado_mode'] : 'embedded';
        // Since v0.2, Bubble Mode is exclusive to site settings.
        // Suppress any previously created Bubble content elements.
        if ($mode === 'bubble') {
            $processedData['widgetHtml'] = '';
            return $processedData;
        }
        $page = in_array($data['tx_gurado_page'] ?? '', ['product', 'products', 'categories', 'cart', 'checkout'], true) ? $data['tx_gurado_page'] : '';
        $attrs = ['shop' => $shop, 'mode' => $mode];
        if ($page !== '') { $attrs['page'] = $page; }
        if ($page === 'product' && (int)($data['tx_gurado_product'] ?? 0) > 0) { $attrs['product'] = (string)(int)$data['tx_gurado_product']; }
        if ($mode === 'bubble') {
            $attrs['align'] = in_array($data['tx_gurado_align'] ?? '', ['left','right'], true) ? $data['tx_gurado_align'] : 'left';
            foreach (['offsetX' => 'tx_gurado_offset_x', 'offsetY' => 'tx_gurado_offset_y'] as $attr => $field) {
                $value = trim((string)($data[$field] ?? ''));
                if ($value !== '' && preg_match('/^-?\d+(?:\.\d+)?(?:px|rem|em|%|vh|vw)?$/', $value)) { $attrs[$attr] = $value; }
            }
        }
        $pairs = [];
        foreach ($attrs as $key => $value) { $pairs[] = $key . '="' . htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '"'; }
        $processedData['widgetHtml'] = '<gurado-widget ' . implode(' ', $pairs) . '></gurado-widget>';
        GeneralUtility::makeInstance(AssetCollector::class)->addJavaScript('gurado-webconnect-widget', 'https://statics.gurado.de/widget/assets/widget.js', ['type' => 'text/javascript'], ['external' => true]);
        return $processedData;
    }
}
