<?php
declare(strict_types=1);

$page = [
    'title' => t('page_not_found'),
    'description' => t('page_not_found_text'),
    'eyebrow' => '404',
    'heading' => t('page_not_found'),
    'lede' => t('page_not_found_text'),
    'crumbs' => [['label' => '404']],
    'actions' => [
        ['href' => '', 'label' => t('return_home')],
        ['href' => 'resources', 'label' => t('nav_resources')],
    ],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
