<?php
declare(strict_types=1);

$leadership = $site['leadership'] ?? [];
$page = [
    'title' => $leadership['name'] ?? t('link_leadership'),
    'description' => loc($leadership['bio'] ?? ''),
    'eyebrow' => t('minister_eyebrow'),
    'heading' => $leadership['name'] ?? '',
    'lede' => loc($leadership['role'] ?? ''),
    'crumbs' => [['label' => t('link_leadership')]],
    'actions' => [
        ['href' => $leadership['officialProfile'] ?? 'about', 'label' => t('official_profile')],
        ['href' => 'about', 'label' => t('nav_about')],
    ],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container">
        <div class="minister minister--premium">
            <img src="<?= Router::e(url($leadership['image'] ?? '')) ?>" alt="<?= Router::e($leadership['name'] ?? '') ?>">
            <div class="minister-copy">
                <div class="eyebrow"><?= Router::e(t('minister_eyebrow')) ?></div>
                <h2><?= Router::e($leadership['name'] ?? '') ?></h2>
                <h4><?= Router::e(loc($leadership['role'] ?? '')) ?></h4>
                <p><?= Router::e(loc($leadership['bio'] ?? '')) ?></p>
                <a class="btn" target="_blank" rel="noopener" href="<?= Router::e($leadership['officialProfile'] ?? '#') ?>"><?= Router::e(t('official_profile')) ?></a>
                <div class="notice"><?= Router::e(t('image_notice')) ?></div>
            </div>
        </div>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
