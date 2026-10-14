<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

$fields = [
    'tx_gurado_shop' => ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:storecode', 'config' => ['type' => 'input', 'required' => true, 'max' => 255]],
    'tx_gurado_mode' => ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:mode', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:embedded', 'value' => 'embedded']], 'default' => 'embedded']],
    'tx_gurado_page' => ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:page', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'default' => 'products', 'items' => [['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:products', 'value' => 'products'], ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:categories', 'value' => 'categories'], ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:product', 'value' => 'product']]]],
    'tx_gurado_product' => ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:productId', 'displayCond' => 'FIELD:tx_gurado_page:=:product', 'config' => ['type' => 'number', 'default' => 0, 'range' => ['lower' => 0]]],
    'tx_gurado_align' => ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:align', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:left', 'value' => 'left'], ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:right', 'value' => 'right']]]],
    'tx_gurado_offset_x' => ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:offsetX', 'config' => ['type' => 'input', 'max' => 24]],
    'tx_gurado_offset_y' => ['label' => 'LLL:EXT:gurado_webconnect/Resources/Private/Language/locallang.xlf:offsetY', 'config' => ['type' => 'input', 'max' => 24]],
];
ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);
ExtensionManagementUtility::addTcaSelectItem('tt_content', 'CType', ['label' => 'gurado WebConnect', 'value' => 'gurado_webconnect', 'group' => 'default', 'icon' => 'gurado-webconnect'], 'textmedia', 'after');
$GLOBALS['TCA']['tt_content']['types']['gurado_webconnect'] = [
    'showitem' => '--palette--;;general,header,tx_gurado_shop,tx_gurado_page,tx_gurado_product',
];
