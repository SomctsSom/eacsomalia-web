<?php
declare(strict_types=1);

$ok = false;
$error = false;
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if (posted('website') !== '') {
        $ok = true;
    } else {
        $required = ['name', 'email', 'border', 'description'];
        $missing = false;
        foreach ($required as $field) {
            if (posted($field) === '') {
                $missing = true;
                break;
            }
        }
        if ($missing || !filter_var(posted('email'), FILTER_VALIDATE_EMAIL)) {
            $error = true;
        } else {
            $ok = save_submission('ntb', [
                'name' => posted('name'),
                'organisation' => posted('organisation'),
                'email' => posted('email'),
                'phone' => posted('phone'),
                'border' => posted('border'),
                'partner_state' => posted('partner_state'),
                'description' => posted('description'),
            ]);
            if (!$ok) {
                $error = true;
            }
        }
    }
}

$page = [
    'title' => t('link_ntb'),
    'description' => t('form_qa_notice'),
    'eyebrow' => t('nav_business'),
    'heading' => t('link_ntb'),
    'lede' => t('form_qa_notice'),
    'crumbs' => [['label' => t('link_ntb')]],
];

require dirname(__DIR__) . '/partials/header.php';
require dirname(__DIR__) . '/partials/page-hero.php';
?>
<section class="page-body">
    <div class="container page-layout">
        <div class="form-panel">
            <?php if ($ok): ?>
                <div class="notice notice-success"><?= Router::e(t('form_success')) ?></div>
            <?php else: ?>
                <?php if ($error): ?>
                    <div class="notice notice-error"><?= Router::e(t('form_error')) ?></div>
                <?php endif; ?>
                <p class="form-lead"><?= Router::e(t('form_intro')) ?></p>
                <form method="post" class="form" novalidate>
                    <div class="hp" aria-hidden="true">
                        <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                    </div>
                    <label><?= Router::e(t('form_full_name')) ?> *
                        <input type="text" name="name" required value="<?= Router::e(posted('name')) ?>">
                    </label>
                    <label><?= Router::e(t('form_organisation')) ?>
                        <input type="text" name="organisation" value="<?= Router::e(posted('organisation')) ?>">
                    </label>
                    <div class="form-grid">
                        <label>Email *
                            <input type="email" name="email" required value="<?= Router::e(posted('email')) ?>">
                        </label>
                        <label><?= Router::e(t('form_phone')) ?>
                            <input type="tel" name="phone" value="<?= Router::e(posted('phone')) ?>">
                        </label>
                    </div>
                    <div class="form-grid">
                        <label><?= Router::e(t('form_border')) ?> *
                            <input type="text" name="border" required value="<?= Router::e(posted('border')) ?>">
                        </label>
                        <label><?= Router::e(t('form_partner_state')) ?>
                            <input type="text" name="partner_state" value="<?= Router::e(posted('partner_state')) ?>">
                        </label>
                    </div>
                    <label><?= Router::e(t('form_describe_barrier')) ?> *
                        <textarea name="description" rows="6" required><?= Router::e(posted('description')) ?></textarea>
                    </label>
                    <button class="btn primary" type="submit"><?= Router::e(t('submit')) ?></button>
                </form>
            <?php endif; ?>
        </div>
        <aside class="page-aside">
            <div class="aside-card">
                <h2><?= Router::e(t('how_it_works')) ?></h2>
                <ol class="steps">
                    <li><?= Router::e(t('step_one')) ?></li>
                    <li><?= Router::e(t('step_two')) ?></li>
                    <li><?= Router::e(t('step_three')) ?></li>
                </ol>
            </div>
            <div class="aside-card aside-card--navy">
                <h2><?= Router::e(t('secure_channel')) ?></h2>
                <p><?= Router::e(t('form_qa_notice')) ?></p>
            </div>
        </aside>
    </div>
</section>
<?php
require dirname(__DIR__) . '/partials/page-cta.php';
require dirname(__DIR__) . '/partials/footer.php';
