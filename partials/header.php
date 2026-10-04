<?php
declare(strict_types=1);

$siteName = loc($i18n['site_name'] ?? 'Somalia EAC Affairs');
$pageTitle = ($page['title'] ?? '') !== '' ? $page['title'] . ' — ' . $siteName : $siteName;
$pageDesc = $page['description'] ?? loc($site['site']['tagline'] ?? '');
$htmlLang = match ($lang) {
    'so' => 'so',
    'sw' => 'sw',
    default => 'en',
};
$mfaUrl = 'https://web.mfa.gov.so/';
?>
<!doctype html>
<html lang="<?= Router::e($htmlLang) ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= Router::e($pageTitle) ?></title>
    <meta name="description" content="<?= Router::e($pageDesc) ?>">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Source+Serif+4:opsz,wght@8..60,500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?= Router::e(asset('images/somalia-emblem.png')) ?>" type="image/png">
    <link rel="stylesheet" href="<?= Router::e(asset('css/style.css')) ?>">
    <link rel="stylesheet" href="<?= Router::e(asset('css/pages.css')) ?>">
    <link rel="stylesheet" href="<?= Router::e(asset('css/portal.css')) ?>">
</head>
<body class="<?= Router::e(trim(($page['body_class'] ?? '') . ((str_contains($page['body_class'] ?? '', 'page-home')) ? '' : ' page-inner'))) ?>">
<a class="skip-link" href="#main"><?= Router::e(t('skip')) ?></a>
<div class="topbar">
    <div class="container topbar-inner">
        <span class="topbar-welcome"><?= Router::e(t('welcome')) ?> <span class="qa-flag">QA</span></span>
        <div class="topbar-tools">
            <nav class="lang-text" aria-label="Language">
                <a class="<?= $lang === 'so' ? 'is-active' : '' ?>" href="<?= Router::e(lang_url('so')) ?>"><?= Router::e(t('lang_somali')) ?></a>
                <span aria-hidden="true">|</span>
                <a class="<?= $lang === 'en' ? 'is-active' : '' ?>" href="<?= Router::e(lang_url('en')) ?>"><?= Router::e(t('lang_english')) ?></a>
                <span aria-hidden="true">|</span>
                <a class="<?= $lang === 'sw' ? 'is-active' : '' ?>" href="<?= Router::e(lang_url('sw')) ?>"><?= Router::e(t('lang_swahili')) ?></a>
            </nav>
            <div class="text-size" role="group" aria-label="<?= Router::e(t('text_size')) ?>">
                <button type="button" data-size="s" aria-label="Small">A</button>
                <button type="button" data-size="m" class="is-active" aria-label="Medium">A</button>
                <button type="button" data-size="l" aria-label="Large">A</button>
            </div>
            <div class="social-links">
                <a href="<?= Router::e($mfaUrl) ?>" target="_blank" rel="noopener" aria-label="Facebook"><?= icon_svg('facebook') ?></a>
                <a href="<?= Router::e($mfaUrl) ?>" target="_blank" rel="noopener" aria-label="X"><?= icon_svg('x') ?></a>
                <a href="<?= Router::e($mfaUrl) ?>" target="_blank" rel="noopener" aria-label="YouTube"><?= icon_svg('youtube') ?></a>
            </div>
        </div>
    </div>
</div>
<header class="site-head">
    <div class="container head-grid">
        <a class="brand brand-stack" href="<?= Router::e(url()) ?>">
            <img class="seal-img" src="<?= Router::e(asset('images/somalia-emblem.png')) ?>" alt="Coat of arms of the Federal Republic of Somalia" width="62" height="62">
            <span>
                <small><?= Router::e(t('brand_country')) ?></small>
                <strong><?= Router::e(t('brand_line')) ?></strong>
                <em><?= Router::e(t('brand_ministry')) ?></em>
            </span>
        </a>
        <nav class="nav" id="siteNav">
            <div class="nav-inner">
                <a class="nav-link<?= is_active_nav('home') ? ' is-current' : '' ?>" href="<?= Router::e(url()) ?>"><?= Router::e(t('nav_home')) ?></a>
                <a class="nav-link<?= is_active_nav('about') ? ' is-current' : '' ?>" href="<?= Router::e(url('about')) ?>"><?= Router::e(t('nav_about_eac')) ?></a>
                <div class="nav-item<?= is_active_nav('somalia') ? ' is-current' : '' ?>">
                    <a class="nav-link" href="<?= Router::e(url('somalia-in-eac/what-membership-means')) ?>"><?= Router::e(t('nav_somalia')) ?> <span class="caret">▾</span></a>
                    <div class="mega">
                        <div>
                            <h4><?= Router::e(t('mega_membership')) ?></h4>
                            <a href="<?= Router::e(url('somalia-in-eac/membership')) ?>"><?= Router::e(t('link_membership')) ?></a>
                            <a href="<?= Router::e(url('tracker')) ?>"><?= Router::e(t('link_roadmap')) ?></a>
                            <a href="<?= Router::e(url('somalia-in-eac/leadership')) ?>"><?= Router::e(t('link_leadership')) ?></a>
                        </div>
                        <div>
                            <h4><?= Router::e(t('mega_representation')) ?></h4>
                            <a href="<?= Router::e(url('somalia-in-eac/eala')) ?>"><?= Router::e(t('link_eala')) ?></a>
                            <a href="<?= Router::e(url('somalia-in-eac/eacj')) ?>"><?= Router::e(t('link_eacj')) ?></a>
                            <a href="<?= Router::e(url('somalia-in-eac/coordination')) ?>"><?= Router::e(t('link_coordination')) ?></a>
                        </div>
                        <div>
                            <h4><?= Router::e(t('mega_understand')) ?></h4>
                            <a href="<?= Router::e(url('somalia-in-eac/what-membership-means')) ?>"><?= Router::e(t('link_means')) ?></a>
                            <a href="<?= Router::e(url('somalia-in-eac/timeline')) ?>"><?= Router::e(t('link_timeline')) ?></a>
                            <a href="<?= Router::e(url('somalia-in-eac/faqs')) ?>"><?= Router::e(t('link_faqs')) ?></a>
                        </div>
                    </div>
                </div>
                <div class="nav-item<?= (is_active_nav('business') || is_active_nav('citizens')) ? ' is-current' : '' ?>">
                    <a class="nav-link" href="<?= Router::e(url('business/trading')) ?>"><?= Router::e(t('nav_services')) ?> <span class="caret">▾</span></a>
                    <div class="mega">
                        <div>
                            <h4><?= Router::e(t('mega_trade')) ?></h4>
                            <a href="<?= Router::e(url('business/trading')) ?>"><?= Router::e(t('link_trading')) ?></a>
                            <a href="<?= Router::e(url('business/documents')) ?>"><?= Router::e(t('link_required_docs')) ?></a>
                            <a href="<?= Router::e(url('business/tariffs')) ?>"><?= Router::e(t('link_tariffs')) ?></a>
                            <a href="<?= Router::e(url('business/report-ntb')) ?>"><?= Router::e(t('link_ntb')) ?></a>
                        </div>
                        <div>
                            <h4><?= Router::e(t('mega_mobility')) ?></h4>
                            <a href="<?= Router::e(url('citizens/travel-passport')) ?>"><?= Router::e(t('link_travel')) ?></a>
                            <a href="<?= Router::e(url('citizens/work-residence')) ?>"><?= Router::e(t('link_work')) ?></a>
                            <a href="<?= Router::e(url('citizens/study')) ?>"><?= Router::e(t('link_study')) ?></a>
                        </div>
                        <div>
                            <h4><?= Router::e(t('mega_participate')) ?></h4>
                            <a href="<?= Router::e(url('citizens/consultations')) ?>"><?= Router::e(t('link_consultations')) ?></a>
                            <a href="<?= Router::e(url('citizens/representatives')) ?>"><?= Router::e(t('link_reps')) ?></a>
                            <a href="<?= Router::e(url('opportunities')) ?>"><?= Router::e(t('link_scholarships')) ?></a>
                        </div>
                    </div>
                </div>
                <a class="nav-link<?= is_active_nav('opportunities') ? ' is-current' : '' ?>" href="<?= Router::e(url('opportunities')) ?>"><?= Router::e(t('nav_opportunities')) ?></a>
                <a class="nav-link<?= is_active_nav('resources') ? ' is-current' : '' ?>" href="<?= Router::e(url('resources')) ?>"><?= Router::e(t('nav_resources')) ?></a>
                <a class="nav-link<?= is_active_nav('news') ? ' is-current' : '' ?>" href="<?= Router::e(url('news')) ?>"><?= Router::e(t('nav_news')) ?></a>
                <a class="nav-link<?= is_active_nav('citizens') && str_contains(Router::currentPath(), 'representatives') ? ' is-current' : '' ?>" href="<?= Router::e(url('citizens/representatives')) ?>"><?= Router::e(t('nav_contact')) ?></a>
            </div>
        </nav>
        <div class="head-cta">
            <button class="icon-btn" type="button" id="searchToggle" aria-expanded="false" aria-controls="searchPanel" aria-label="<?= Router::e(t('search')) ?>"><?= icon_svg('search') ?></button>
            <div class="official-wrap">
                <button class="btn official-btn" type="button" id="officialToggle" aria-expanded="false" aria-controls="officialMenu"><?= Router::e(t('official_links')) ?></button>
                <div class="official-menu" id="officialMenu" hidden>
                    <a target="_blank" rel="noopener" href="https://web.mfa.gov.so/">MFA Somalia</a>
                    <a target="_blank" rel="noopener" href="https://www.eac.int/">EAC Secretariat</a>
                    <a target="_blank" rel="noopener" href="https://www.eac.int/resources">EAC e-Library</a>
                </div>
            </div>
            <button class="pill mobile-toggle" type="button" id="menuToggle" aria-expanded="false" aria-controls="siteNav"><?= Router::e(t('menu')) ?></button>
        </div>
    </div>
    <div class="search-panel" id="searchPanel" hidden>
        <form class="container search-form" action="<?= Router::e(url('resources')) ?>" method="get">
            <label class="sr-only" for="siteSearch"><?= Router::e(t('search')) ?></label>
            <input id="siteSearch" type="search" name="q" placeholder="<?= Router::e(t('search_site')) ?>" autocomplete="off">
            <button class="btn primary" type="submit"><?= Router::e(t('search')) ?></button>
        </form>
    </div>
</header>
<main id="main">
