<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'gurado WebConnect',
    'description' => 'Embed the gurado gift voucher shop in TYPO3.',
    'category' => 'plugin',
    'author' => 'gurado GmbH',
    'author_email' => 'info@gurado.de',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-14.99.99',
            'fluid_styled_content' => '13.4.0-14.99.99',
        ],
    ],
];
