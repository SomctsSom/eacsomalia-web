<?php
declare(strict_types=1);

$key = $route['page'] ?? '';
$content = $data->page($key);
if (!$content) {
    http_response_code(404);
    require __DIR__ . '/404.php';
    return;
}

$page = [
    'title' => loc($content['title'] ?? ''),
    'description' => loc($content['intro'] ?? ''),
    'eyebrow' => loc($content['eyebrow'] ?? ''),
    'heading' => loc($content['title'] ?? ''),
    'lede' => loc($content['intro'] ?? ''),
    'crumbs' => [
        ['label' => loc($content['title'] ?? '')],
    ],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container page-layout">
        <div class="page-main">
            <?php foreach ($content['sections'] ?? [] as $index => $section): ?>
            <article class="content-card">
                <div class="content-card__index"><?= str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) ?></div>
                <?php if (!empty($section['heading'])): ?>
                    <h2><?= Router::e(loc($section['heading'])) ?></h2>
                <?php endif; ?>
                <?php if (!empty($section['body'])): ?>
                    <p><?= Router::e(loc($section['body'])) ?></p>
                <?php endif; ?>
                <?php if (!empty($section['list'])): ?>
                    <ul class="check-list">
                        <?php foreach ($section['list'] as $item): ?>
                            <li><?= Router::e(loc($item)) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if (!empty($section['links'])): ?>
                    <div class="link-row">
                        <?php foreach ($section['links'] as $link): ?>
                            <?php
                            $href = $link['href'] ?? '#';
                            $external = str_starts_with($href, 'http');
                            ?>
                            <a class="btn<?= $external ? '' : ' primary' ?>" href="<?= Router::e($external ? $href : url($href)) ?>"<?= $external ? ' target="_blank" rel="noopener"' : '' ?>><?= Router::e(loc($link['label'] ?? '')) ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>

            <?php if (!empty($content['timeline'])): ?>
            <ol class="timeline">
                <?php foreach ($content['timeline'] as $event): ?>
                <li>
                    <div class="timeline-date"><?= Router::e((string) ($event['date'] ?? '')) ?></div>
                    <div class="timeline-copy">
                        <h3><?= Router::e(loc($event['title'] ?? '')) ?></h3>
                        <p><?= Router::e(loc($event['text'] ?? '')) ?></p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ol>
            <?php endif; ?>

            <?php if (!empty($content['faqs'])): ?>
            <div class="faq-list">
                <?php foreach ($content['faqs'] as $i => $faq): ?>
                <details class="faq"<?= $i === 0 ? ' open' : '' ?>>
                    <summary><?= Router::e(loc($faq['q'] ?? '')) ?></summary>
                    <p><?= Router::e(loc($faq['a'] ?? '')) ?></p>
                </details>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php require dirname(__DIR__) . '/partials/page-aside.php'; ?>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
