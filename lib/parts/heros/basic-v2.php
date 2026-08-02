<style>
	.top-bar {
		background-color: var(--color-blue);
	}
	.top-bar__phone-number {
		color: var(--color-white);
	}

    <?php if($hero['bg_image']) : ?>
        .hero {
            background-image: url(<?php echo $hero['bg_image']; ?>)
        }
    <?php else : ?>
        .hero {
            background-image: url(<?php echo esc_url( get_template_directory_uri() . '/dist/images/basic-v2-hero.webp' ); ?>)
        }
    <?php endif; ?>
</style>
<section <?php echo $classes; ?>>
	<div class="container">
        <div class="hero--basic-v2__row">
            <div class="hero--basic-v2__image hero--basic-v2__col">
                <?php echo wp_get_attachment_image( $hero['image'], 'full', false, [ 
                    'loading' => 'eager',
                    'fetchpriority' => 'high',
                    'decoding' => 'async',
                    'class' => ''] ); ?>
            </div>
            <div class="hero--basic-v2__content hero--basic-v2__col">
                <h1 class="hero--basic__title section-title"><?php echo $title; ?></h1>
                <?php if ( ! empty( $hero['subheading'] ) ) : ?>
                    <p class="hero--basic__subheading">
                        <?php echo $hero['subheading']; ?>
                    </p>
                <?php endif; ?>
                <?php if ( ! empty( $hero['content'] ) ) : ?>
                    <div class="hero--basic__text section-content">
                        <?php echo $hero['content']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
	</div>

	
	<img loading="eager" class="hero--basic__bottom-border" src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/hero-bottom.webp' ); ?>" alt="">
</section>