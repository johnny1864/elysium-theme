<section class="hero">
    <div class="hero__bg">
        <?php
        $background_image = get_sub_field('background_image');
        if (!empty($background_image)) {
            echo wp_get_attachment_image($background_image, 'full', false, [
                'loading' => 'eager',
                'decoding' => 'async'
            ]);
        }
        ?>
    </div>

    <div class="container">
        <div class="hero__content">

            <?php if ($headline = get_sub_field('headline')): ?>
                <span class="hero__intro-text">
                    <?php echo esc_html($headline); ?>
                </span>
            <?php endif; ?>

            <?php if ($gradient_text = get_sub_field('gradient_text')): ?>
                <h2 class="hero__title gradient-text">
                    <?php echo esc_html($gradient_text); ?>
                </h2>
            <?php endif; ?>

            <?php if ($content = get_sub_field('content')): ?>
                <div class="hero__highlight-text">
                    <?php echo wp_kses_post($content); ?>
                </div>
            <?php endif; ?>

            <p class="hero__bottom-text">Now, the best brands do too.</p>

            <a href="#contact" class="btn">Let’s talk</a>
        </div>

        <div class="hero__video-wrapper">

            <?php
            $video_mp4   = get_sub_field('video_mp4');
            $video_webm  = get_sub_field('video_webm');
            $video_poster = get_sub_field('video_poster');
            ?>

            <?php if ($video_mp4 || $video_webm): ?>
                <div class="hero__video">
                    <video 
                        autoplay 
                        loop 
                        muted 
                        playsinline 
                        preload="metadata"
                        poster="<?php echo $video_poster ? esc_url($video_poster) : ''; ?>"
                    >
                        <?php if ($video_webm): ?>
                            <source src="<?php echo esc_url($video_webm); ?>" type="video/webm">
                        <?php endif; ?>
                        <?php if ($video_mp4): ?>
                            <source src="<?php echo esc_url($video_mp4); ?>" type="video/mp4">
                        <?php endif; ?>
                    </video>
                </div>
            <?php endif; ?>

            <?php if ($img1 = get_sub_field('desktop_image_1')): ?>
                <img 
                    class="hero__video-img hero__video-img1"
                    src="<?php echo esc_url($img1); ?>"
                    alt=""
                    loading="lazy"
                    aria-hidden="true"
                />
            <?php endif; ?>

            <?php if ($img2 = get_sub_field('desktop_image_2')): ?>
                <img 
                    class="hero__video-img hero__video-img2"
                    src="<?php echo esc_url($img2); ?>"
                    alt=""
                    loading="lazy"
                    aria-hidden="true"
                />
            <?php endif; ?>

            <img 
                class="hero__video-arrow"
                src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/video-arrow.svg'); ?>"
                alt=""
                aria-hidden="true"
                loading="lazy"
            />
        </div>
    </div>
</section>