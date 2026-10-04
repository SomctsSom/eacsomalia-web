<?php
declare(strict_types=1);

$slug = $route['slug'] ?? '';
$item = $data->newsBySlug($slug);
if (!$item) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return;
}

$page = [
    'title' => loc($item['title'] ?? ''),
    'description' => loc($item['summary'] ?? ''),
    'eyebrow' => loc($item['category'] ?? ''),
    'heading' => loc($item['title'] ?? ''),
    'lede' => format_date((string) ($item['date'] ?? '')),
    'crumbs' => [
        ['label' => t('nav_news'), 'href' => 'news'],
        ['label' => loc($item['title'] ?? '')],
    ],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container page-layout">
        <article class="article-sheet">
            <p class="lede"><?= Router::e(loc($item['summary'] ?? '')) ?></p>
            <div class="article-body">
                <?= loc($item['body'] ?? '') ?>
            </div>
            <a class="text-link" href="<?= Router::e(url('news')) ?>"><?= Router::e(t('back_news')) ?></a>
        </article>
        <?php require dirname(__DIR__) . '/partials/page-aside.php'; ?>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
