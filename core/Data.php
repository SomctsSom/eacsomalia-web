<?php
declare(strict_types=1);

class Data
{
    private static ?self $instance = null;
    private array $site = [];
    private array $pages = [];
    private array $i18n = [];

    private function __construct()
    {
        $this->site = $this->loadJson('site.json');
        $this->pages = $this->loadJson('pages.json');
        $this->i18n = $this->loadJson('i18n.json');
    }

    public static function getInstance(): self
    {
        return self::$instance ??= new self();
    }

    private function loadJson(string $file): array
    {
        $path = dirname(__DIR__) . '/data/' . $file;
        if (!is_readable($path)) {
            return [];
        }
        $decoded = json_decode((string) file_get_contents($path), true);
        return is_array($decoded) ? $decoded : [];
    }

    public function site(): array
    {
        return $this->site;
    }

    public function page(string $key): ?array
    {
        return $this->pages[$key] ?? null;
    }

    public function i18n(): array
    {
        return $this->i18n;
    }

    public function newsBySlug(string $slug): ?array
    {
        foreach ($this->site['news'] ?? [] as $item) {
            if (($item['slug'] ?? '') === $slug) {
                return $item;
            }
        }
        return null;
    }
}
