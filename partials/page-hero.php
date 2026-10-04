<?php
declare(strict_types=1);
$crumbs = $page['crumbs'] ?? [];
$heroImage = $page['hero_image'] ?? page_hero_image();
$siteMeta = $GLOBALS['site']['site'] ?? [];
?>
<section class="page-hero">
    <div class="page-hero__media" aria-hidden="true">
        <img src="<?= Router::e($heroImage) ?>" alt="">
    </div>
    <div class="page-hero__shade"></div>
    <div class="container page-hero__inner">
        <?php if ($crumbs): ?>
        <nav class="crumbs" aria-label="Breadcrumb">
            <a href="<?= Router::e(url()) ?>"><?= Router::e(t('breadcrumb_home')) ?></a>
            <?php foreach ($crumbs as $crumb): ?>
                <span aria-hidden="true">/</span>
                <?php if (!empty($crumb['href'])): ?>
                    <a href="<?= Router::e(url($crumb['href'])) ?>"><?= Router::e($crumb['label']) ?></a>
                <?php else: ?>
                    <span><?= Router::e($crumb['label']) ?></span>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>
        <?php endif; ?>
        <div class="page-hero__grid">
            <div>
                <?php if (!empty($page['eyebrow'])): ?>
                    <div class="eyebrow page-hero__eyebrow"><?= Router::e($page['eyebrow']) ?></div>
                <?php endif; ?>
                <h1><?= Router::e($page['heading'] ?? $page['title'] ?? '') ?></h1>
                <?php if (!empty($page['lede'])): ?>
                    <p><?= Router::e($page['lede']) ?></p>
                <?php endif; ?>
                <?php if (!empty($page['actions'])): ?>
                <div class="btns">
                    <?php foreach ($page['actions'] as $i => $action): ?>
                        <?php
                        $href = (string) ($action['href'] ?? '');
                        $external = str_starts_with($href, 'http');
                        ?>
                        <a class="btn<?= $i === 0 ? ' primary' : '' ?>" href="<?= Router::e($external ? $href : url($href)) ?>"<?= $external ? ' target="_blank" rel="noopener"' : '' ?>><?= Router::e($action['label'] ?? '') ?></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <aside class="page-hero__panel">
                <span class="page-hero__badge"><?= Router::e(t('sample_qa_badge')) ?></span>
                <div class="page-hero__stat">
                    <small><?= Router::e(t('last_updated')) ?></small>
                    <strong><?= Router::e(format_date((string) ($siteMeta['lastUpdated'] ?? '2026-08-17'))) ?></strong>
                </div>
                <div class="page-hero__stat">
                    <small><?= Router::e(t('site_tagline')) ?></small>
                    <strong><?= Router::e(t('contact_desk')) ?></strong>
                </div>
            </aside>
        </div>
    </div>
</section>
