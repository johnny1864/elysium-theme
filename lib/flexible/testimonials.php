<?php
$heading_thin = get_sub_field('heading_thin');
$heading_bold = get_sub_field('heading_bold');
$quote_text = get_sub_field('quote_text');
$slides = get_sub_field('slides');
?>

<section class="testimonials">
    <div class="container testimonials__container">
        <div class="testimonials__top">
            <?php if ($heading_thin || $heading_bold): ?>
                <p class="testimonials__eyebrow">
                    <?php echo esc_html($heading_thin); ?>
                    <?php if ($heading_bold): ?>
                        <strong><?php echo esc_html($heading_bold); ?></strong>
                    <?php endif; ?>
                </p>
            <?php endif; ?>
        </div>

        <div class="testimonials__content">
            <div class="testimonials__intro">
                <div class="testimonials__quote-mark">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/testimonial-qoute.svg'); ?>"
                        alt="Quote icon" />
                </div>

                <?php if ($quote_text): ?>
                    <h2 class="testimonials__heading">
                        <?php echo esc_html($quote_text); ?>
                    </h2>
                <?php endif; ?>

                <div class="testimonials__scribble">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/testimonial-line.svg'); ?>"
                        alt="" aria-hidden="true" />
                </div>
            </div>

            <?php if ($slides): ?>
                <div class="testimonial-slider">
                    <div class="swiper testimonial-swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($slides as $index => $slide): ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-slider__card">
                                        <?php
                                            echo wp_get_attachment_image(
                                                $slide['bg_image']['ID'],
                                                'xl',
                                                false,
                                                [
                                                    'class' => 'testimonial-slider__card-bg-image',
                                                    'alt' => esc_attr($slide['bg_image']['alt'] ?: 'Testimonial ' . ($index + 1)),
                                                    'loading' => 'lazy',
                                                ]
                                            );
                                        ?>
                                        <img class="testimonial-slider__card-frame" src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/picture-frame.webp'); ?>" alt="">
                                        <div class="testimonial-slider__card-content">
                                            <img class="testimonial-slider__card-stars" src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/stars.png'); ?>" alt="">
                                            <p class="testimonial-slider__card-quote">
                                                <?php echo $slide['quote'] ?>
                                            </p>
                                             <h5 class="testimonial-slider__card-author">
                                                <?php echo $slide['author'] ?>
                                             </h5>
                                            <span class="testimonial-slider__card-author-title">
                                                 <?php echo $slide['author_title'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="testimonial-slider__pagination"></div>
                        </div>
                    </div>
            <?php endif; ?>
        </div>
    </div>
</section>