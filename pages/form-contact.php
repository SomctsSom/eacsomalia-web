<?php
declare(strict_types=1);

$ok = false;
$error = false;
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if (posted('website') !== '') {
        $ok = true;
    } else {
        $required = ['name', 'email', 'message'];
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
            $ok = save_submission('contact', [
                'name' => posted('name'),
                'email' => posted('email'),
                'topic' => posted('topic'),
                'message' => posted('message'),
            ]);
            if (!$ok) {
                $error = true;
            }
        }
    }
}

$page = [
    'title' => t('link_reps'),
    'description' => t('form_qa_notice'),
    'eyebrow' => t('nav_citizens'),
    'heading' => t('link_reps'),
    'lede' => t('form_qa_notice'),
    'crumbs' => [['label' => t('link_reps')]],
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
                    <label>Email *
                        <input type="email" name="email" required value="<?= Router::e(posted('email')) ?>">
                    </label>
                    <label><?= Router::e(t('form_topic')) ?>
                        <select name="topic">
                            <option value="EALA"<?= posted('topic') === 'EALA' ? ' selected' : '' ?>>EALA</option>
                            <option value="EACJ"<?= posted('topic') === 'EACJ' ? ' selected' : '' ?>>EACJ</option>
                            <option value="National"<?= posted('topic') === 'National' ? ' selected' : '' ?>><?= Router::e(t('form_national_coord')) ?></option>
                        </select>
                    </label>
                    <label><?= Router::e(t('form_message')) ?> *
                        <textarea name="message" rows="6" required><?= Router::e(posted('message')) ?></textarea>
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
