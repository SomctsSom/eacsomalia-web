<?php
declare(strict_types=1);
$related = related_links();
$sources = $GLOBALS['site']['sources'] ?? [];
$current = Router::currentPath();
?>
<aside class="page-aside">
    <div class="aside-card">
        <h2><?= Router::e(t('related_in_section')) ?></h2>
        <nav class="aside-nav">
            <?php foreach ($related as $link): ?>
                <a class="<?= ($link['href'] ?? '') === $current ? 'is-active' : '' ?>" href="<?= Router::e(url($link['href'] ?? '')) ?>">
                    <span><?= Router::e($link['label'] ?? '') ?></span>
                    <span aria-hidden="true">→</span>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
    <?php if ($sources): ?>
    <div class="aside-card aside-card--navy">
        <h2><?= Router::e(t('official_sources')) ?></h2>
        <nav class="aside-nav aside-nav--light">
            <?php foreach ($sources as $source): ?>
                <a href="<?= Router::e((string) ($source['url'] ?? '#')) ?>" target="_blank" rel="noopener">
                    <span><?= Router::e(loc($source['label'] ?? '')) ?></span>
                    <span aria-hidden="true">↗</span>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
    <?php endif; ?>
</aside>
