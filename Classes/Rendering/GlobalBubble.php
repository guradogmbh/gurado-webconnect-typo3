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
        if (!(bool)$settings->get('gurado.webconnect.bubble.enabled', false)) {
            return '';
        }
        $shop = trim((string)$settings->get('gurado.webconnect.bubble.shop', ''));
        if ($shop === '') {
            return '';
        }
        $align = (string)$settings->get('gurado.webconnect.bubble.align', 'right');
        if (!in_array($align, ['left', 'right'], true)) {
            $align = 'right';
        }
        $attributes = ['shop' => $shop, 'mode' => 'bubble', 'align' => $align];
        foreach (['offsetX', 'offsetY'] as $attribute) {
            $value = trim((string)$settings->get('gurado.webconnect.bubble.' . $attribute, ''));
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
