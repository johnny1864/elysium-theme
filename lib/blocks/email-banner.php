<style>
    .email-banner {
        background-image: url(<?php echo esc_url( get_template_directory_uri() . '/dist/images/bricks-bg.webp' ); ?>);
    }
</style>
<section class="email-banner">
    <div class="container">
        <div class="email-banner__grid">
            <div class="email-banner__icon position-relative">
                <?= getSVG('mail-accent-left', false, false) ?>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/mail-icon.webp' ); ?>"
						alt="Mail icon" />
            </div>
            <div class="email-banner__content">
                <h2 class="h2 email-banner__content-title">
                    GET INSIGHTS you’ll<br>
                    <span>
                        Actually read.
                        <?= getSVG('title-underline', false, false) ?>
                    </span>
                </h2>
            </div>
            <div class="email-banner__form position-relative">
                <?php echo do_shortcode('[gravityform id="2" title="false"]'); ?>
                <?= getSVG('mail-accent-right', false, false) ?>
            </div>
        </div>
    </div>
</section>