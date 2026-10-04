<?php
declare(strict_types=1);

$items = $site['tracker']['items'] ?? [];
$page = [
    'title' => t('tracker_title'),
    'description' => t('tracker_intro'),
    'eyebrow' => t('tracker_eyebrow'),
    'heading' => t('tracker_title'),
    'lede' => t('tracker_intro'),
    'crumbs' => [['label' => t('tracker_title')]],
    'actions' => [
        ['href' => 'somalia-in-eac/membership', 'label' => t('link_membership')],
        ['href' => 'resources', 'label' => t('nav_resources')],
    ],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container">
        <div class="kpi-grid">
            <?php foreach ($items as $item): ?>
            <?php $progress = (int) ($item['progress'] ?? 0); ?>
            <article class="kpi-card">
                <div class="kpi-ring" style="--p:<?= $progress ?>">
                    <strong><?= $progress ?>%</strong>
                </div>
                <h3><?= Router::e(loc($item['pillar'] ?? '')) ?></h3>
                <span class="status-pill"><?= Router::e(loc($item['status'] ?? '')) ?></span>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="toolbar premium-toolbar">
            <label>
                <?= Router::e(t('status')) ?>
                <select id="trackerFilter">
                    <option value=""><?= Router::e(t('filter_all')) ?></option>
                    <?php
                    $statuses = [];
                    foreach ($items as $item) {
                        $statuses[loc($item['status'] ?? '')] = true;
                    }
                    foreach (array_keys($statuses) as $status):
                    ?>
                        <option value="<?= Router::e($status) ?>"><?= Router::e($status) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <p class="notice"><?= Router::e(t('sample_notice')) ?></p>
        </div>

        <div class="commit-list" id="trackerTable">
            <?php foreach ($items as $item): ?>
            <article class="commit-card" data-status="<?= Router::e(loc($item['status'] ?? '')) ?>">
                <div class="commit-card__head">
                    <div>
                        <div class="meta"><?= Router::e(t('pillar')) ?></div>
                        <h3><?= Router::e(loc($item['pillar'] ?? '')) ?></h3>
                    </div>
                    <span class="status-pill"><?= Router::e(loc($item['status'] ?? '')) ?></span>
                </div>
                <div class="bar"><span style="width:<?= (int) ($item['progress'] ?? 0) ?>%"></span></div>
                <p><?= Router::e(loc($item['note'] ?? '')) ?></p>
                <dl class="meta-grid">
                    <div>
                        <dt><?= Router::e(t('owner')) ?></dt>
                        <dd><?= Router::e(loc($item['owner'] ?? '')) ?></dd>
                    </div>
                    <div>
                        <dt><?= Router::e(t('deadline')) ?></dt>
                        <dd><?= Router::e((string) ($item['deadline'] ?? '')) ?></dd>
                    </div>
                    <div>
                        <dt><?= Router::e(t('legal_source')) ?></dt>
                        <dd><?= Router::e(loc($item['source'] ?? '')) ?></dd>
                    </div>
                    <div>
                        <dt><?= Router::e(t('last_verified')) ?></dt>
                        <dd><?= Router::e(format_date((string) ($item['lastVerified'] ?? ''))) ?></dd>
                    </div>
                </dl>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
