<?php
declare(strict_types=1);

$items = $site['news'] ?? [];
$featured = $items[0] ?? null;
$rest = array_slice($items, 1);
$page = [
    'title' => t('news_title'),
    'description' => t('news_intro'),
    'eyebrow' => t('news_eyebrow'),
    'heading' => t('news_title'),
    'lede' => t('news_intro'),
    'crumbs' => [['label' => t('nav_news')]],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container">
        <?php if ($featured): ?>
        <a class="featured-story" href="<?= Router::e(url('news/' . ($featured['slug'] ?? ''))) ?>">
            <div class="featured-story__media">
                <img src="<?= Router::e(asset('images/sonna-8N5A6490EAC.jpg')) ?>" alt="">
            </div>
            <div class="featured-story__copy">
                <div class="meta"><?= Router::e(t('featured')) ?> · <?= Router::e(loc($featured['category'] ?? '')) ?> · <?= Router::e(format_date((string) ($featured['date'] ?? ''))) ?></div>
                <h2><?= Router::e(loc($featured['title'] ?? '')) ?></h2>
                <p><?= Router::e(loc($featured['summary'] ?? '')) ?></p>
                <span class="text-link"><?= Router::e(t('read_briefing')) ?> →</span>
            </div>
        </a>
        <?php endif; ?>

        <div class="cards news-grid">
            <?php foreach ($rest as $item): ?>
            <article class="card card--lift">
                <div class="meta"><?= Router::e(loc($item['category'] ?? '')) ?> · <?= Router::e(format_date((string) ($item['date'] ?? ''))) ?></div>
                <h3><?= Router::e(loc($item['title'] ?? '')) ?></h3>
                <p><?= Router::e(loc($item['summary'] ?? '')) ?></p>
                <a href="<?= Router::e(url('news/' . ($item['slug'] ?? ''))) ?>"><?= Router::e(t('read_update')) ?></a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
