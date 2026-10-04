<?php
declare(strict_types=1);

class Router
{
    public static function currentPath(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $base = BASE_PATH;

        if ($base !== '' && str_starts_with($uri, $base)) {
            $uri = substr($uri, strlen($base));
        }

        $uri = '/' . ltrim($uri, '/');
        $uri = preg_replace('#/index\.php$#', '/', $uri) ?? $uri;

        return trim($uri, '/') ;
    }

    public static function match(): array
    {
        $path = self::currentPath();

        if (preg_match('#^news/([a-z0-9\-]+)$#', $path, $m)) {
            return ['view' => 'news-detail', 'slug' => $m[1], 'nav' => 'news'];
        }

        $routes = [
            '' => ['view' => 'home', 'nav' => 'home'],
            'tracker' => ['view' => 'tracker', 'nav' => 'tracker'],
            'commitments' => ['view' => 'tracker', 'nav' => 'tracker'],
            'somalia-in-eac/membership' => ['view' => 'content', 'page' => 'membership', 'nav' => 'somalia'],
            'somalia-in-eac/roadmap' => ['view' => 'tracker', 'nav' => 'tracker'],
            'somalia-in-eac/leadership' => ['view' => 'leadership', 'nav' => 'somalia'],
            'somalia-in-eac/eala' => ['view' => 'content', 'page' => 'eala', 'nav' => 'somalia'],
            'somalia-in-eac/eacj' => ['view' => 'content', 'page' => 'eacj', 'nav' => 'somalia'],
            'somalia-in-eac/coordination' => ['view' => 'content', 'page' => 'coordination', 'nav' => 'somalia'],
            'somalia-in-eac/what-membership-means' => ['view' => 'content', 'page' => 'what-membership-means', 'nav' => 'somalia'],
            'somalia-in-eac/timeline' => ['view' => 'content', 'page' => 'timeline', 'nav' => 'somalia'],
            'somalia-in-eac/faqs' => ['view' => 'content', 'page' => 'somalia-faqs', 'nav' => 'somalia'],
            'business/trading' => ['view' => 'content', 'page' => 'trading', 'nav' => 'business'],
            'business/documents' => ['view' => 'content', 'page' => 'business-documents', 'nav' => 'business'],
            'business/tariffs' => ['view' => 'content', 'page' => 'tariffs', 'nav' => 'business'],
            'business/report-ntb' => ['view' => 'form-ntb', 'nav' => 'business'],
            'business/border-procedures' => ['view' => 'content', 'page' => 'border-procedures', 'nav' => 'business'],
            'business/standards' => ['view' => 'content', 'page' => 'standards', 'nav' => 'business'],
            'business/faqs' => ['view' => 'content', 'page' => 'business-faqs', 'nav' => 'business'],
            'citizens/travel-passport' => ['view' => 'content', 'page' => 'travel', 'nav' => 'citizens'],
            'citizens/work-residence' => ['view' => 'content', 'page' => 'work-residence', 'nav' => 'citizens'],
            'citizens/study' => ['view' => 'content', 'page' => 'study', 'nav' => 'citizens'],
            'citizens/scholarships' => ['view' => 'opportunities', 'filter' => 'Scholarship', 'nav' => 'opportunities'],
            'citizens/consultations' => ['view' => 'content', 'page' => 'consultations', 'nav' => 'citizens'],
            'citizens/representatives' => ['view' => 'form-contact', 'nav' => 'citizens'],
            'resources' => ['view' => 'documents', 'nav' => 'resources'],
            'news' => ['view' => 'news', 'nav' => 'news'],
            'opportunities' => ['view' => 'opportunities', 'nav' => 'opportunities'],
            'about' => ['view' => 'content', 'page' => 'about', 'nav' => 'about'],
        ];

        if (isset($routes[$path])) {
            return $routes[$path];
        }

        http_response_code(404);
        return ['view' => '404', 'nav' => ''];
    }

    public static function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}
