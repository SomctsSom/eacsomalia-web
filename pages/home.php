<?php
declare(strict_types=1);

$page = [
    'title' => loc($site['site']['tagline'] ?? t('site_name')),
    'description' => loc($site['site']['tagline'] ?? ''),
    'body_class' => 'page-home',
];

require dirname(__DIR__) . '/partials/header.php';

$hero = $data->hero();
$quick = $site['quickActions'] ?? [];
$tracker = $site['tracker']['items'] ?? [];
$leadership = $site['leadership'] ?? [];
$news = array_slice($site['news'] ?? [], 0, 3);
$events = $site['events'] ?? [];
?>
<section class="hero">
    <div id="heroSlides">
        <?php foreach ($hero as $i => $slide): ?>
        <article class="slide<?= $i === 0 ? ' active' : '' ?>">
            <img src="<?= Router::e(url($slide['image'] ?? '')) ?>" alt="<?= Router::e(loc($slide['alt'] ?? $slide['title'] ?? '')) ?>" style="<?= Router::e(hero_image_style($slide)) ?>">
            <div class="hero-content">
                <div class="container">
                    <div class="hero-copy">
                        <h1><?= Router::e(loc($slide['title'] ?? '')) ?></h1>
                        <div class="btns">
                            <a class="btn primary" href="<?= Router::e(url($slide['primaryHref'] ?? '')) ?>"><?= Router::e(loc($slide['primary'] ?? '')) ?> ›</a>
                            <a class="btn ghost" href="<?= Router::e(url($slide['secondaryHref'] ?? '')) ?>"><?= Router::e(loc($slide['secondary'] ?? '')) ?> ›</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <?php endforeach; ?>
    </div>
    <button class="hero-arrow left" id="prev" type="button" aria-label="<?= Router::e(t('prev_slide')) ?>">‹</button>
    <button class="hero-arrow right" id="next" type="button" aria-label="<?= Router::e(t('next_slide')) ?>">›</button>
    <div class="hero-dots" id="heroDots">
        <?php foreach ($hero as $i => $_): ?>
            <button class="hero-dot<?= $i === 0 ? ' active' : '' ?>" type="button" data-slide="<?= $i ?>"></button>
        <?php endforeach; ?>
    </div>
</section>

<section class="quick" id="services">
    <div class="container">
        <div class="quick-grid quick-grid-5">
            <?php foreach ($quick as $item): ?>
            <a class="quick-card" href="<?= Router::e(url($item['href'] ?? '')) ?>">
                <div class="icon"><?= icon_svg((string) ($item['icon'] ?? 'trade')) ?></div>
                <h3><?= Router::e(loc($item['title'] ?? '')) ?></h3>
                <p><?= Router::e(loc($item['text'] ?? '')) ?></p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section spotlight">
    <div class="container spotlight-grid">
        <article class="spot-card spot-member">
            <div class="eyebrow"><?= Router::e(t('latest_update')) ?></div>
            <h2><?= Router::e(t('eighth_member_title')) ?></h2>
            <p><?= Router::e(t('eighth_member_text')) ?></p>
            <a class="btn green" href="<?= Router::e(url('somalia-in-eac/membership')) ?>"><?= Router::e(t('read_more')) ?> ›</a>
            <svg class="africa-map" viewBox="0 0 200 220" aria-hidden="true">
                <path d="M108 8c12 6 22 18 20 32-8 8-4 18 6 24 8 4 14 16 8 26-10 6-6 18 4 24 6 14-8 22-18 28-4 18 8 28 2 42-10 12-28 16-42 12-18 6-32-8-36-24-12-8-8-24 2-32 4-16-10-22-8-36 6-14 4-30 16-38 8-16 28-22 46-18z"/>
                <circle class="somalia-dot" cx="148" cy="78" r="10"/>
            </svg>
        </article>
        <article class="spot-card spot-minister">
            <img src="<?= Router::e(url($leadership['image'] ?? '')) ?>" alt="<?= Router::e($leadership['name'] ?? '') ?>">
            <div class="spot-minister-copy">
                <div class="eyebrow"><?= Router::e(t('minister_eyebrow')) ?></div>
                <h2><?= Router::e($leadership['name'] ?? '') ?></h2>
                <p><?= Router::e(loc($leadership['role'] ?? '')) ?></p>
                <a class="btn ghost" href="<?= Router::e(url('somalia-in-eac/leadership')) ?>"><?= Router::e(t('minister_message')) ?> ›</a>
            </div>
        </article>
    </div>
</section>

<section class="section alt home-columns">
    <div class="container columns-3">
        <div class="panel">
            <div class="panel-head">
                <h2><?= Router::e(t('integration_tracker')) ?></h2>
            </div>
            <?php foreach ($tracker as $item): ?>
            <div class="track">
                <div class="track-top">
                    <span><?= Router::e(loc($item['pillar'] ?? '')) ?></span>
                    <span><?= (int) ($item['progress'] ?? 0) ?>%</span>
                </div>
                <div class="bar"><span class="tone-<?= Router::e((string) ($item['tone'] ?? 'blue')) ?>" style="width:<?= (int) ($item['progress'] ?? 0) ?>%"></span></div>
            </div>
            <?php endforeach; ?>
            <a class="panel-link" href="<?= Router::e(url('tracker')) ?>"><?= Router::e(t('see_commitments')) ?> →</a>
        </div>
        <div class="panel">
            <div class="panel-head">
                <h2><?= Router::e(t('latest_news')) ?></h2>
                <a href="<?= Router::e(url('news')) ?>"><?= Router::e(t('view_all')) ?></a>
            </div>
            <div class="news-list">
                <?php foreach ($news as $item): ?>
                <a class="news-row" href="<?= Router::e(url('news/' . ($item['slug'] ?? ''))) ?>">
                    <img src="<?= Router::e(url($item['image'] ?? 'assets/images/somalia-flag.jpg')) ?>" alt="">
                    <span>
                        <strong><?= Router::e(loc($item['title'] ?? '')) ?></strong>
                        <small><?= Router::e(format_date((string) ($item['date'] ?? ''))) ?></small>
                    </span>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="panel">
            <div class="panel-head">
                <h2><?= Router::e(t('upcoming_events')) ?></h2>
                <a href="<?= Router::e(url('news')) ?>"><?= Router::e(t('view_all')) ?></a>
            </div>
            <div class="event-list">
                <?php foreach ($events as $event):
                    $parts = event_parts((string) ($event['date'] ?? ''));
                ?>
                <article class="event-row">
                    <div class="event-date">
                        <span><?= Router::e($parts['mon']) ?></span>
                        <strong><?= Router::e($parts['day']) ?></strong>
                    </div>
                    <div>
                        <h3><?= Router::e(loc($event['title'] ?? '')) ?></h3>
                        <small><?= Router::e(format_date((string) ($event['date'] ?? ''))) ?> · <?= Router::e(loc($event['place'] ?? '')) ?></small>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="trade-banner">
    <div class="trade-banner-media">
        <img src="<?= Router::e(asset('images/trade-port.jpg')) ?>" alt="">
    </div>
    <div class="container trade-banner-copy">
        <div>
            <div class="eyebrow"><?= Router::e(t('trade_banner_kicker')) ?></div>
            <h2><?= Router::e(t('trade_banner_title')) ?></h2>
            <p><?= Router::e(t('trade_banner_text')) ?></p>
        </div>
        <a class="btn" href="<?= Router::e(url('opportunities')) ?>"><?= Router::e(t('explore_opportunities')) ?> ›</a>
    </div>
</section>
<?php require dirname(__DIR__) . '/partials/footer.php'; ?>
