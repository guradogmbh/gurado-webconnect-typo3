<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

$fields = [
    'tx_gurado_shop' => ['label' => 'Shop identifier', 'config' => ['type' => 'input', 'required' => true, 'max' => 255]],
    'tx_gurado_mode' => ['label' => 'Display mode', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['label' => 'Embedded', 'value' => 'embedded'], ['label' => 'Bubble', 'value' => 'bubble']], 'default' => 'embedded']],
    'tx_gurado_page' => ['label' => 'Initial page', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['label' => 'Default', 'value' => ''], ['label' => 'Products', 'value' => 'products'], ['label' => 'Categories', 'value' => 'categories'], ['label' => 'Product', 'value' => 'product'], ['label' => 'Cart', 'value' => 'cart'], ['label' => 'Checkout', 'value' => 'checkout']]]],
    'tx_gurado_product' => ['label' => 'Product ID (product page only)', 'config' => ['type' => 'number', 'default' => 0, 'range' => ['lower' => 0]]],
    'tx_gurado_align' => ['label' => 'Bubble alignment', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['label' => 'Left', 'value' => 'left'], ['label' => 'Right', 'value' => 'right']]]],
    'tx_gurado_offset_x' => ['label' => 'Bubble horizontal offset', 'config' => ['type' => 'input', 'max' => 24]],
    'tx_gurado_offset_y' => ['label' => 'Bubble vertical offset', 'config' => ['type' => 'input', 'max' => 24]],
];
ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);
ExtensionManagementUtility::addTcaSelectItem('tt_content', 'CType', ['label' => 'gurado WebConnect', 'value' => 'gurado_webconnect', 'group' => 'default'], 'textmedia', 'after');
$GLOBALS['TCA']['tt_content']['types']['gurado_webconnect'] = [
    'showitem' => '--palette--;;general,header,tx_gurado_shop,tx_gurado_mode,tx_gurado_page,tx_gurado_product,tx_gurado_align,tx_gurado_offset_x,tx_gurado_offset_y',
];
