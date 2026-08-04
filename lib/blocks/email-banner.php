<section class="email-banner">
    <div class="container">
        <div class="email-banner__grid">
            <div class="email-banner__icon">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/mail-icon.webp' ); ?>"
						alt="Mail icon" />
            </div>
            <div class="email-banner__content">
                <p class="h2">
                    GET INSIGHTS you’ll
                    <span>
                        Actually read.
                    </span>
                </p>
            </div>
            <div class="email-banner__form">
                <?php echo do_shortcode('[gravityform id="2" title="false"]'); ?>
            </div>
        </div>
    </div>
</section>