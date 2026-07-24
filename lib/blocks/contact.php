<?php
    $headline = get_field('headline');
    $float_image = get_field('float_image');
    $form_shortcode = get_field('form_shortcode');
?>

<section class="contact-block">
    <div class="container">
        <div class="contact-block__intro">
            <div class="contact-block__intro-float-image text-center">
                <?php
                if(!empty($float_image)) {
                    echo wp_get_attachment_image(
                        $float_image['ID'],
                        'xl',
                        false,
                        [
                            'class' => '',
                            'alt' => esc_attr( $float_image['alt'] ),
                            'loading' => 'lazy',
                        ]
                    );
                }
                ?>
            </div>
            <h2 class="contact-block__intro-title text-center">
                <?= $headline; ?>
            </h2>
        </div>
    </div>

    <?php if ($form_shortcode): ?>
        <div class="contact-block__form">
            <?= getSVG('contact-bg', false, false); ?>
            <div class="contact-block__form-wrapper">
                <?= getSVG('left-accent', false, false); ?>
                <?= getSVG('right-accent', false, false); ?>
                <?php echo do_shortcode($form_shortcode); ?>
            </div>
        </div>
    <?php endif; ?>
</section>