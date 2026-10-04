<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/bootstrap.php';

$view = $route['view'] ?? '404';
$file = __DIR__ . '/pages/' . $view . '.php';
if (!is_readable($file)) {
    http_response_code(404);
    $file = __DIR__ . '/pages/404.php';
}

require $file;
