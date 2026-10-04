<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/core/Data.php';
require_once dirname(__DIR__) . '/core/Router.php';
require_once __DIR__ . '/helpers.php';

$data = Data::getInstance();
$site = $data->site();
$i18n = $data->i18n();

$docRoot = realpath($_SERVER['DOCUMENT_ROOT'] ?? '') ?: '';
$appRoot = realpath(dirname(__DIR__)) ?: '';
$basePath = ($docRoot && $appRoot && str_starts_with($appRoot, $docRoot))
    ? str_replace('\\', '/', substr($appRoot, strlen($docRoot)))
    : '';
define('BASE_PATH', $basePath);

$lang = 'en';
$allowedLangs = ['en', 'so', 'sw'];
if (isset($_GET['lang']) && in_array($_GET['lang'], $allowedLangs, true)) {
    $lang = $_GET['lang'];
    setcookie('eac_lang', $lang, [
        'expires' => time() + 60 * 60 * 24 * 180,
        'path' => BASE_PATH !== '' ? BASE_PATH : '/',
        'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
        'httponly' => false,
        'samesite' => 'Lax',
    ]);
} elseif (isset($_COOKIE['eac_lang']) && in_array($_COOKIE['eac_lang'], $allowedLangs, true)) {
    $lang = $_COOKIE['eac_lang'];
}

$GLOBALS['lang'] = $lang;
$GLOBALS['i18n'] = $i18n;
$GLOBALS['site'] = $site;

$route = Router::match();
$GLOBALS['nav'] = $route['nav'] ?? '';
$GLOBALS['route'] = $route;

header('X-Robots-Tag: noindex, nofollow, noarchive');
