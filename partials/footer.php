</main>
<footer class="footer">
    <div class="container">
        <div class="footer-grid footer-grid-5">
            <div class="footer-brand">
                <div class="brand brand-stack">
                    <img class="seal-img" src="<?= Router::e(asset('images/somalia-emblem.png')) ?>" alt="Coat of arms of the Federal Republic of Somalia" width="62" height="62">
                    <span>
                        <small><?= Router::e(t('brand_country')) ?></small>
                        <strong><?= Router::e(t('brand_line')) ?></strong>
                    </span>
                </div>
                <p><?= Router::e(t('footer_portal_blurb')) ?></p>
                <div class="social-links social-links--footer">
                    <a href="https://web.mfa.gov.so/" target="_blank" rel="noopener" aria-label="Facebook"><?= icon_svg('facebook') ?></a>
                    <a href="https://web.mfa.gov.so/" target="_blank" rel="noopener" aria-label="X"><?= icon_svg('x') ?></a>
                    <a href="https://web.mfa.gov.so/" target="_blank" rel="noopener" aria-label="YouTube"><?= icon_svg('youtube') ?></a>
                    <a href="https://web.mfa.gov.so/" target="_blank" rel="noopener" aria-label="LinkedIn"><?= icon_svg('linkedin') ?></a>
                    <a href="mailto:eac@mfa.gov.so" aria-label="Email"><?= icon_svg('mail') ?></a>
                </div>
            </div>
            <div>
                <h4><?= Router::e(t('footer_quick')) ?></h4>
                <a href="<?= Router::e(url()) ?>"><?= Router::e(t('nav_home')) ?></a>
                <a href="<?= Router::e(url('about')) ?>"><?= Router::e(t('nav_about_eac')) ?></a>
                <a href="<?= Router::e(url('somalia-in-eac/what-membership-means')) ?>"><?= Router::e(t('nav_somalia')) ?></a>
                <a href="<?= Router::e(url('news')) ?>"><?= Router::e(t('nav_news')) ?></a>
                <a href="<?= Router::e(url('citizens/representatives')) ?>"><?= Router::e(t('nav_contact')) ?></a>
            </div>
            <div>
                <h4><?= Router::e(t('footer_popular')) ?></h4>
                <a href="<?= Router::e(url('citizens/travel-passport')) ?>"><?= Router::e(t('visa_info')) ?></a>
                <a href="<?= Router::e(url('citizens/work-residence')) ?>"><?= Router::e(t('work_in_eac')) ?></a>
                <a href="<?= Router::e(url('business/trading')) ?>"><?= Router::e(t('business_reg')) ?></a>
                <a href="<?= Router::e(url('business/report-ntb')) ?>"><?= Router::e(t('ql_barrier')) ?></a>
                <a href="<?= Router::e(url('opportunities')) ?>"><?= Router::e(t('nav_opportunities')) ?></a>
            </div>
            <div>
                <h4><?= Router::e(t('official_links')) ?></h4>
                <a target="_blank" rel="noopener" href="https://web.mfa.gov.so/">MFA Somalia ↗</a>
                <a target="_blank" rel="noopener" href="https://www.eac.int/">EAC Secretariat ↗</a>
                <a target="_blank" rel="noopener" href="https://www.eac.int/resources">EAC e-Library ↗</a>
                <a target="_blank" rel="noopener" href="https://www.eac.int/"><?= Router::e(t('gazette')) ?> ↗</a>
            </div>
            <div>
                <h4><?= Router::e(t('footer_contact')) ?></h4>
                <p class="footer-contact"><?= Router::e(t('footer_address')) ?></p>
                <p class="footer-contact"><?= Router::e(t('footer_phone')) ?></p>
                <p class="footer-contact"><a href="mailto:eac@mfa.gov.so"><?= Router::e(t('footer_email')) ?></a></p>
                <p class="footer-contact"><?= Router::e(t('footer_hours')) ?></p>
            </div>
        </div>
        <div class="copyright copyright-bar">
            <span><?= Router::e(t('copyright_mfa')) ?></span>
            <nav>
                <a href="<?= Router::e(url('about')) ?>"><?= Router::e(t('privacy')) ?></a>
                <a href="<?= Router::e(url('about')) ?>"><?= Router::e(t('terms')) ?></a>
                <a href="<?= Router::e(url('about')) ?>"><?= Router::e(t('accessibility')) ?></a>
            </nav>
        </div>
    </div>
</footer>
<script src="<?= Router::e(asset('js/app.js')) ?>"></script>
</body>
</html>
