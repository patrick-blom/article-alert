<?php

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = [
    'id' => 'articlealert',
    'title' => [
        'de' => 'PaBlo - Artikel Alarm',
        'en' => 'PaBlo - article alert',
    ],
    'description' => [
        'de' => 'Diese Modul erm&ouml;glicht dem Kunden sich benachrichtigen zu lassen, sobald ein ausverkaufter Artikel wieder verfügbar ist.',
        'en' => 'This module allows the customer to be informed as soon as a sold out item is available again.',
    ],
    'version' => '1.0',
    'author' => 'Patrick Blom',
    'url' => 'https://www.patrick-blom.de/',
    'email' => 'info@patrick-blom.de',
    'extend' => [
        \OxidEsales\Eshop\Application\Controller\ArticleDetailsController::class => \PaBlo\ArticleAlert\Infrastructure\Controller\ArticleDetails::class,
    ],
    'blocks' => [
        [
            'template' => 'page/details/inc/productmain.tpl',
            'block' => 'details_productmain_tobasket',
            'file' => 'Infrastructure/views/blocks/page/deatils/inc/productmain__details_productmain_tobasket.tpl',
            'position' => '1',
        ]
    ],
    'events' => [
        'onActivate' => 'PaBlo\ArticleAlert\Infrastructure\Setup\ArticleAlert::onActivate',
        'onDeactivate' => 'PaBlo\ArticleAlert\Infrastructure\Setup\ArticleAlert::onDeactivate',
    ]
];
