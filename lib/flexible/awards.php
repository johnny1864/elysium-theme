<?php
    $heading = get_sub_field('heading');
    $subtext = get_sub_field('subtext');
    $logos = get_sub_field('logos');
?>

<section class="awards">
    <div class="container">

        <?php if ($heading): ?>
            <h2 class="awards__heading">
                <?php echo wp_kses_post($heading); ?>
            </h2>
        <?php endif; ?>

        <?php if ($subtext): ?>
            <p class="awards__subhead">
                <?php echo esc_html($subtext); ?>
            </p>
        <?php endif; ?>

        <?php if ($logos): ?>
            <div class="awards-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <?php foreach ($logos as $index => $logo): ?>
                            <div class="swiper-slide">
                                <?php
                                echo wp_get_attachment_image(
                                    $logo['ID'],
                                    'full',
                                    false,
                                    [
                                        'alt' => esc_attr($logo['alt'] ?: 'Award ' . ($index + 1)),
                                        'loading' => 'lazy',
                                    ]
                                );
                                ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <div class="swiper-button-prev">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/award-prev.svg'); ?>" alt=""
                        aria-hidden="true" />
                </div>

                <div class="swiper-button-next">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/award-next.svg'); ?>" alt=""
                        aria-hidden="true" />
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>