<?php
declare(strict_types=1);

$items = $site['opportunities'] ?? [];
$filter = $route['filter'] ?? '';

$page = [
    'title' => t('opp_title'),
    'description' => t('opp_intro'),
    'eyebrow' => t('opp_eyebrow'),
    'heading' => t('opp_title'),
    'lede' => t('opp_intro'),
    'crumbs' => [['label' => t('nav_opportunities')]],
];

$types = [];
foreach ($site['opportunities'] ?? [] as $item) {
    $enType = is_array($item['type'] ?? null) ? (string) ($item['type']['en'] ?? '') : (string) ($item['type'] ?? '');
    if ($enType !== '') {
        $types[$enType] = loc($item['type']);
    }
}

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container">
        <div class="toolbar premium-toolbar">
            <div class="chips" id="oppFilter">
                <button type="button" class="chip<?= $filter === '' ? ' is-active' : '' ?>" data-type=""><?= Router::e(t('filter_all')) ?></button>
                <?php foreach ($types as $enType => $label): ?>
                    <button type="button" class="chip<?= $filter === $enType ? ' is-active' : '' ?>" data-type="<?= Router::e($enType) ?>"><?= Router::e($label) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="opp-grid" id="oppCards">
            <?php foreach ($items as $item): ?>
            <?php
            $enType = is_array($item['type'] ?? null) ? (string) ($item['type']['en'] ?? '') : (string) ($item['type'] ?? '');
            ?>
            <article class="opp-card" data-type="<?= Router::e($enType) ?>"<?= $filter !== '' && $filter !== $enType ? ' hidden' : '' ?>>
                <div class="opp-card__top">
                    <span class="meta"><?= Router::e(loc($item['type'] ?? '')) ?></span>
                    <span class="deadline-pill"><?= Router::e(t('deadline')) ?> <?= Router::e((string) ($item['deadline'] ?? '')) ?></span>
                </div>
                <h3><?= Router::e(loc($item['title'] ?? '')) ?></h3>
                <p><?= Router::e(loc($item['summary'] ?? $item['eligibility'] ?? '')) ?></p>
                <div class="opp-card__foot">
                    <span><?= Router::e(t('eligibility')) ?>: <?= Router::e(loc($item['eligibility'] ?? '')) ?></span>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <p class="empty-state" id="oppEmpty" hidden><?= Router::e(t('no_results')) ?></p>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
