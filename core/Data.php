<?php
declare(strict_types=1);

class Data
{
    private static ?self $instance = null;
    private array $site = [];
    private array $pages = [];
    private array $i18n = [];
    private array $hero = [];

    private function __construct()
    {
        $this->site = $this->loadJson('site.json');
        $this->pages = $this->loadJson('pages.json');
        $this->i18n = $this->loadJson('i18n.json');
        $this->hero = $this->loadJson('hero.json');
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

    public function hero(): array
    {
        $config = $this->hero;
        $defaults = $config['defaults'] ?? ['fit' => 'cover', 'crop' => ['x' => 50, 'y' => 30]];
        $slides = $config['slides'] ?? $this->site['hero'] ?? [];
        $out = [];
        foreach ($slides as $slide) {
            if (isset($slide['enabled']) && $slide['enabled'] === false) {
                continue;
            }
            $slide['fit'] = (string) ($slide['fit'] ?? $defaults['fit'] ?? 'cover');
            $slide['crop'] = [
                'x' => (float) ($slide['crop']['x'] ?? $defaults['crop']['x'] ?? 50),
                'y' => (float) ($slide['crop']['y'] ?? $defaults['crop']['y'] ?? 30),
            ];
            $out[] = $slide;
        }
        usort($out, static function ($a, $b) {
            return ((int) ($a['sort'] ?? 0)) <=> ((int) ($b['sort'] ?? 0));
        });
        return $out;
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
