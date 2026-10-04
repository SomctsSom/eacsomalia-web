<?php
declare(strict_types=1);

function url(string $path = ''): string
{
    if ($path !== '' && $path[0] === '#') {
        return (BASE_PATH !== '' ? BASE_PATH . '/' : '/') . $path;
    }

    $path = trim($path, '/');
    $base = BASE_PATH !== '' ? BASE_PATH : '';
    return $path === '' ? ($base !== '' ? $base . '/' : '/') : $base . '/' . $path;
}

function asset(string $path): string
{
    $base = BASE_PATH !== '' ? BASE_PATH : '';
    return $base . '/assets/' . ltrim($path, '/');
}

function loc(mixed $value, ?string $lang = null): string
{
    $lang = $lang ?? ($GLOBALS['lang'] ?? 'en');
    if (is_string($value)) {
        return $value;
    }
    if (!is_array($value)) {
        return '';
    }
    if (isset($value[$lang]) && is_string($value[$lang]) && $value[$lang] !== '') {
        return $value[$lang];
    }
    return (string) ($value['en'] ?? '');
}

function t(string $key): string
{
    $i18n = $GLOBALS['i18n'] ?? [];
    $lang = $GLOBALS['lang'] ?? 'en';
    $entry = $i18n[$key] ?? $key;
    return loc($entry, $lang);
}

function is_active_nav(string $group): bool
{
    return ($GLOBALS['nav'] ?? '') === $group;
}

function format_date(string $date): string
{
    $ts = strtotime($date);
    if ($ts === false) {
        return $date;
    }
    return date('j M Y', $ts);
}

function event_parts(string $date): array
{
    $ts = strtotime($date);
    if ($ts === false) {
        return ['mon' => '', 'day' => ''];
    }
    return [
        'mon' => strtoupper(date('M', $ts)),
        'day' => date('j', $ts),
    ];
}

function icon_svg(string $name): string
{
    $icons = [
        'trade' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v12H4zM8 7V5h8v2M9 12h6"/></svg>',
        'travel' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 16v-2l-8-5V3.5A1.5 1.5 0 0 0 11.5 2 1.5 1.5 0 0 0 10 3.5V9l-8 5v2l8-2.5V19l-2 1.5V22l3.5-1 3.5 1v-1.5L13 19v-5.5z"/></svg>',
        'students' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 1 9l11 6 9-4.91V17h2V9M5 13.18V17c0 1.66 3.13 3 7 3s7-1.34 7-3v-3.82"/></svg>',
        'citizens' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M16 11a4 4 0 1 0-8 0 4 4 0 0 0 8 0zm-4 6c-4.42 0-8 1.79-8 4v1h16v-1c0-2.21-3.58-4-8-4z"/></svg>',
        'barrier' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/></svg>',
        'search' => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>',
        'facebook' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14 9h3V6h-3c-2.2 0-4 1.8-4 4v2H8v3h2v7h3v-7h3l1-3h-4v-2c0-.6.4-1 1-1z"/></svg>',
        'x' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 4l7.2 9.3L4.6 20H7l5.1-5.8L16.8 20H20l-7.5-9.7L19.2 4H17l-4.7 5.3L8 4H4z"/></svg>',
        'youtube' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23 12s0-3.4-.4-5c-.2-1.1-1.1-2-2.2-2.2C18.2 4.4 12 4.4 12 4.4s-6.2 0-8.4.4C2.5 5 1.6 5.9 1.4 7 1 8.6 1 12 1 12s0 3.4.4 5c.2 1.1 1.1 2 2.2 2.2 2.2.4 8.4.4 8.4.4s6.2 0 8.4-.4c1.1-.2 2-1.1 2.2-2.2.4-1.6.4-5 .4-5z"/><path fill="#fff" stroke="none" d="M10 15.5v-7l6 3.5-6 3.5z"/></svg>',
        'linkedin' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 9H4V20h2.5V9zM5.2 4A1.6 1.6 0 1 0 5.2 7.2 1.6 1.6 0 0 0 5.2 4zM20 20h-2.5v-5.6c0-1.8-.8-2.4-1.8-2.4s-2 .8-2 2.5V20H11.2V9H13.7v1.5c.6-1 1.8-1.8 3.4-1.8 2.4 0 4 1.5 4 4.8V20z"/></svg>',
        'mail' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 6h16v12H4z"/><path d="M4 7l8 6 8-6"/></svg>',
    ];
    return $icons[$name] ?? '';
}

function save_submission(string $type, array $payload): bool
{
    $dir = dirname(__DIR__) . '/submissions';
    if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
        return false;
    }
    if (!is_writable($dir)) {
        @chmod($dir, 0775);
    }
    if (!is_writable($dir)) {
        return false;
    }
    $row = [
        'id' => bin2hex(random_bytes(8)),
        'type' => $type,
        'created_at' => gmdate('c'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? '',
        'payload' => $payload,
    ];
    $file = $dir . '/' . $type . '-' . date('Ymd') . '.jsonl';
    return file_put_contents($file, json_encode($row, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND | LOCK_EX) !== false;
}

function posted(string $key): string
{
    return trim((string) ($_POST[$key] ?? ''));
}

function lang_url(string $targetLang): string
{
    $path = Router::currentPath();
    $base = BASE_PATH !== '' ? BASE_PATH : '';
    $href = $path === '' ? ($base !== '' ? $base . '/' : '/') : $base . '/' . $path;
    $query = $_GET;
    unset($query['lang']);
    $query['lang'] = $targetLang;
    return $href . '?' . http_build_query($query);
}

function page_hero_image(): string
{
    $nav = $GLOBALS['nav'] ?? '';
    $map = [
        'business' => 'images/trade-corridor.svg',
        'citizens' => 'images/citizen-mobility.svg',
        'opportunities' => 'images/citizen-mobility.svg',
        'tracker' => 'images/eac-unity.svg',
        'somalia' => 'images/somalia-flag.jpg',
        'news' => 'images/somalia-flag.jpg',
        'resources' => 'images/somalia-flag.jpg',
        'about' => 'images/somalia-flag.jpg',
    ];
    return asset($map[$nav] ?? 'images/somalia-flag.jpg');
}

function related_links(?string $nav = null): array
{
    $nav = $nav ?? ($GLOBALS['nav'] ?? '');
    $groups = [
        'somalia' => [
            ['href' => 'somalia-in-eac/what-membership-means', 'label' => t('link_means')],
            ['href' => 'somalia-in-eac/membership', 'label' => t('link_membership')],
            ['href' => 'somalia-in-eac/timeline', 'label' => t('link_timeline')],
            ['href' => 'somalia-in-eac/leadership', 'label' => t('link_leadership')],
            ['href' => 'tracker', 'label' => t('nav_tracker')],
        ],
        'business' => [
            ['href' => 'business/trading', 'label' => t('link_trading')],
            ['href' => 'business/documents', 'label' => t('link_required_docs')],
            ['href' => 'business/tariffs', 'label' => t('link_tariffs')],
            ['href' => 'business/report-ntb', 'label' => t('link_ntb')],
            ['href' => 'business/border-procedures', 'label' => t('link_border')],
        ],
        'citizens' => [
            ['href' => 'citizens/travel-passport', 'label' => t('link_travel')],
            ['href' => 'citizens/work-residence', 'label' => t('link_work')],
            ['href' => 'citizens/study', 'label' => t('link_study')],
            ['href' => 'opportunities', 'label' => t('nav_opportunities')],
            ['href' => 'citizens/representatives', 'label' => t('link_reps')],
        ],
        'tracker' => [
            ['href' => 'somalia-in-eac/membership', 'label' => t('link_membership')],
            ['href' => 'somalia-in-eac/coordination', 'label' => t('link_coordination')],
            ['href' => 'resources', 'label' => t('nav_resources')],
        ],
        'resources' => [
            ['href' => 'business/documents', 'label' => t('link_required_docs')],
            ['href' => 'tracker', 'label' => t('nav_tracker')],
            ['href' => 'news', 'label' => t('nav_news')],
        ],
        'news' => [
            ['href' => 'opportunities', 'label' => t('nav_opportunities')],
            ['href' => 'tracker', 'label' => t('nav_tracker')],
            ['href' => 'resources', 'label' => t('nav_resources')],
        ],
        'opportunities' => [
            ['href' => 'citizens/study', 'label' => t('link_study')],
            ['href' => 'news', 'label' => t('nav_news')],
            ['href' => 'citizens/consultations', 'label' => t('link_consultations')],
        ],
        'about' => [
            ['href' => 'somalia-in-eac/leadership', 'label' => t('link_leadership')],
            ['href' => 'somalia-in-eac/coordination', 'label' => t('link_coordination')],
            ['href' => 'tracker', 'label' => t('nav_tracker')],
        ],
    ];
    return $groups[$nav] ?? $groups['somalia'];
}
