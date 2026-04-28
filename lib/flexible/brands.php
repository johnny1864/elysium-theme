<?php
$heading = get_sub_field('heading');
$logos = get_sub_field('logos');
$cta = get_sub_field('cta');
?>

<section class="brands">
    <div class="container">

        <?php if ($heading): ?>
            <h2 class="brands__heading">
                <?php echo esc_html($heading); ?>
            </h2>
        <?php endif; ?>

        <?php if ($logos): ?>
            <div class="brands-slider">
                <div class="swiper">
                    <div class="swiper-wrapper">

                        <?php foreach ($logos as $index => $logo): ?>
                            <div class="swiper-slide">
                                <div class="brands-slider__logo">
                                    <?php
                                    echo wp_get_attachment_image(
                                        is_array($logo) ? $logo['ID'] : $logo,
                                        'full',
                                        false,
                                        [
                                            'alt' => esc_attr(
                                                is_array($logo) && !empty($logo['alt'])
                                                ? $logo['alt']
                                                : 'Brand ' . ($index + 1)
                                            ),
                                            'loading' => 'lazy'
                                        ]
                                    );
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <!-- Navigation -->
                <div class="brands-button-prev swiper-button-prev">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/brands-prev.svg'); ?>" alt=""
                        aria-hidden="true" />
                </div>

                <div class="brands-button-next swiper-button-next">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/brands-next.svg'); ?>" alt=""
                        aria-hidden="true" />
                </div>
            </div>
        <?php endif; ?>

    </div>

    <?php if ($cta): ?>
        <div class="brands__cta">
            <a href="<?php echo esc_url($cta['url']); ?>" class="btn btn--turquoise"
                target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">
                <?php echo esc_html($cta['title']); ?>
            </a>
        </div>
    <?php endif; ?>

    <picture class="brands-bg">
        <source srcset="<?php echo esc_url(get_template_directory_uri() . '/dist/images/brands-bg-desktop.png'); ?>"
            media="(min-width: 768px)" />
        <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/brands-bg-mobile.png'); ?>" alt=""
            aria-hidden="true" />
    </picture>
</section>