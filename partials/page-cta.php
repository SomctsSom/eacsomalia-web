<?php
declare(strict_types=1);
$ctaLinks = array_slice(related_links(), 0, 3);
?>
<section class="page-cta">
    <div class="container page-cta__inner">
        <div>
            <div class="eyebrow page-cta__eyebrow"><?= Router::e(t('related')) ?></div>
            <h2><?= Router::e(t('need_next')) ?></h2>
            <p><?= Router::e(t('need_next_text')) ?></p>
        </div>
        <div class="page-cta__actions">
            <?php foreach ($ctaLinks as $i => $link): ?>
                <a class="btn<?= $i === 0 ? ' primary' : '' ?>" href="<?= Router::e(url($link['href'] ?? '')) ?>"><?= Router::e($link['label'] ?? '') ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
