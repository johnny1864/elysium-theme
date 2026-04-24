<?php
$heading = get_sub_field('heading');
$heading_bold = get_sub_field('heading_bold');
$heading_line = get_sub_field('heading_line');
$services = get_sub_field('service');
$cta = get_sub_field('cta');
?>

<section class="solutions">
    <div class="container">

        <?php if ($heading || $heading_bold || $heading_line): ?>
            <h2 class="solutions__heading">
                <?php if ($heading): ?>
                    <span class="thin"><?php echo esc_html($heading); ?></span>
                <?php endif; ?>

                <?php if ($heading_bold): ?>
                    <span class="bolded"><?php echo esc_html($heading_bold); ?></span>
                <?php endif; ?>

                <?php if ($heading_line): ?>
                    <span class="lined"><?php echo esc_html($heading_line); ?></span>
                <?php endif; ?>
            </h2>
        <?php endif; ?>

        <?php if ($services): ?>
            <div class="solutions-slider swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($services as $service): ?>

                        <?php
                        $icon = $service['icon'] ?? '';
                        $title = $service['title'] ?? '';
                        $body = $service['body_text'] ?? '';
                        $btn = $service['button'] ?? '';
                        ?>

                        <div class="swiper-slide">
                            <div class="solution-card">

                                <?php if ($icon): ?>
                                    <div class="solution-icon">
                                        <?php
                                        echo wp_get_attachment_image(
                                            $icon,
                                            'full',
                                            false,
                                            [
                                                'alt' => esc_attr($title ?: ''),
                                                'loading' => 'lazy'
                                            ]
                                        );
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($title): ?>
                                    <h3 class="solution-title">
                                        <?php echo esc_html($title); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($body): ?>
                                    <div class="solution-body">
                                        <?php echo wp_kses_post($body); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($btn): ?>
                                    <a href="<?php echo esc_url($btn['url']); ?>" class="btn btn--white"
                                        target="<?php echo esc_attr($btn['target'] ?: '_self'); ?>">
                                        <?php echo esc_html($btn['title']); ?>
                                    </a>
                                <?php endif; ?>

                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        <?php endif; ?>

        <!-- Pagination dots -->
        <div class="solutions-pagination"></div>

        <div class="solutions__cta">
            <?php if ($cta = get_sub_field('cta')): ?>
                <a href="<?php echo esc_url($cta['url']); ?>" class="btn"
                    target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">
                    <?php echo esc_html($cta['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>