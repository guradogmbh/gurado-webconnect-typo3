<?php
declare(strict_types=1);

namespace Gurado\Webconnect\Rendering;

use TYPO3\CMS\Core\Attribute\AsAllowedCallable;
use TYPO3\CMS\Core\Page\AssetCollector;
use TYPO3\CMS\Core\Site\Entity\Site;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class GlobalBubble
{
    #[AsAllowedCallable]
    public function render(string $content = '', array $configuration = []): string
    {
        $site = $GLOBALS['TYPO3_REQUEST']?->getAttribute('site');
        if (!$site instanceof Site) {
            return '';
        }

        $settings = $site->getSettings();
        if (!(bool)$settings->get('gurado.webconnect.bubbleEnabled', false)) {
            return '';
        }
        $shop = trim((string)$settings->get('gurado.webconnect.shop', ''));
        if ($shop === '') {
            return '';
        }
        $align = (string)$settings->get('gurado.webconnect.align', 'right');
        if (!in_array($align, ['left', 'right'], true)) {
            $align = 'right';
        }
        $attributes = ['shop' => $shop, 'mode' => 'bubble', 'align' => $align];
        $page = (string)$settings->get('gurado.webconnect.page', '');
        if (in_array($page, ['products', 'product'], true)) {
            $attributes['page'] = $page;
            if ($page === 'product') {
                $articleId = (int)$settings->get('gurado.webconnect.product', 0);
                if ($articleId > 0) {
                    $attributes['product'] = (string)$articleId;
                } else {
                    // A missing article ID must not open an invalid product detail.
                    $attributes['page'] = 'products';
                }
            }
        }
        foreach (['offsetX', 'offsetY'] as $attribute) {
            $value = trim((string)$settings->get('gurado.webconnect.' . $attribute, ''));
            if ($value !== '' && preg_match('/^-?\d+(?:\.\d+)?(?:px|rem|em|%|vh|vw)?$/', $value)) {
                $attributes[$attribute] = $value;
            }
        }
        $htmlAttributes = [];
        foreach ($attributes as $name => $value) {
            $htmlAttributes[] = $name . '="' . htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '"';
        }
        GeneralUtility::makeInstance(AssetCollector::class)->addJavaScript(
            'gurado-webconnect-widget',
            'https://statics.gurado.de/widget/assets/widget.js',
            ['type' => 'text/javascript'],
            ['external' => true]
        );

        return '<gurado-widget ' . implode(' ', $htmlAttributes) . '></gurado-widget>';
    }
}
