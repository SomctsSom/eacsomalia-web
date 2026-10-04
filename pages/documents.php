<?php
declare(strict_types=1);

$docs = $site['documents'] ?? [];
$page = [
    'title' => t('docs_title'),
    'description' => t('docs_intro'),
    'eyebrow' => t('docs_eyebrow'),
    'heading' => t('docs_title'),
    'lede' => t('docs_intro'),
    'crumbs' => [['label' => t('nav_resources')]],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container">
        <div class="toolbar premium-toolbar">
            <label class="search-field">
                <?= Router::e(t('filter_search')) ?>
                <input type="search" id="docSearch" placeholder="<?= Router::e(t('search_placeholder')) ?>" value="<?= Router::e((string) ($_GET['q'] ?? '')) ?>">
            </label>
        </div>
        <div class="doc-list" id="docTable">
            <?php foreach ($docs as $doc): ?>
            <article class="doc-card">
                <div class="doc-card__type"><?= Router::e(loc($doc['type'] ?? '')) ?></div>
                <div class="doc-card__body">
                    <h3><?= Router::e(loc($doc['title'] ?? '')) ?></h3>
                    <?php if (!empty($doc['summary'])): ?>
                        <p><?= Router::e(loc($doc['summary'])) ?></p>
                    <?php endif; ?>
                    <div class="doc-card__meta">
                        <span><?= Router::e((string) ($doc['year'] ?? '')) ?></span>
                        <span><?= Router::e((string) ($doc['lang'] ?? '')) ?></span>
                        <span><?= Router::e(loc($doc['source'] ?? '')) ?></span>
                    </div>
                </div>
                <?php if (!empty($doc['url'])): ?>
                    <a class="btn" href="<?= Router::e((string) $doc['url']) ?>" target="_blank" rel="noopener"><?= Router::e(t('view_source')) ?> ↗</a>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="empty-state" id="docEmpty" hidden><?= Router::e(t('no_results')) ?></p>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
