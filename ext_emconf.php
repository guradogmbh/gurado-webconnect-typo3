<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'gurado WebConnect',
    'description' => 'Sell gift cards, gift vouchers and gift certificates through TYPO3 with gurado WebConnect.',
    'category' => 'plugin',
    'author' => 'gurado GmbH',
    'author_email' => 'info@gurado.de',
    'state' => 'stable',
    'version' => '1.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '13.4.0-14.99.99',
            'fluid_styled_content' => '13.4.0-14.99.99',
        ],
    ],
];
