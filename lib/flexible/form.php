<?php
$heading_thin = get_sub_field('heading_thin');
$heading_bold = get_sub_field('heading_bold');
$heading_line = get_sub_field('heading_line');
$content      = get_sub_field('content');
$cta          = get_sub_field('cta');
?>

<section class="bottom-form">
    <div class="container">

        <?php if ($heading_thin || $heading_bold || $heading_line): ?>
            <h2 class="bottom-form__heading">

                <?php if ($heading_thin): ?>
                    <span class="thin">
                        <?php echo esc_html($heading_thin); ?>
                    </span>
                <?php endif; ?>

                <?php if ($heading_bold): ?>
                    <span class="bolded">
                        <?php echo esc_html($heading_bold); ?>
                    </span>
                <?php endif; ?>

                <?php if ($heading_line): ?>
                    <span class="lined">
                        <?php echo esc_html($heading_line); ?>
                    </span>
                <?php endif; ?>

            </h2>
        <?php endif; ?>

        <?php if ($content): ?>
            <div class="bottom-form__body-text">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

        <?php if ($cta): ?>
            <div class="bottom-form__cta">
                <a 
                    href="<?php echo esc_url($cta['url']); ?>" 
                    class="btn btn--pink"
                    target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>"
                >
                    <?php echo esc_html($cta['title']); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>