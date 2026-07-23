<style>
	.top-bar {
		background-color: var(--color-blue);
	}
	.top-bar__phone-number {
		color: var(--color-white);
	}
</style>
<section <?php echo $classes; ?> style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/dist/images/web-design-hero.webp' ); ?>)">
	<div class="container">
        <div class="hero--web-design__row">
            <div class="hero--web-design__image hero--web-design__col">
                <?php echo wp_get_attachment_image( $hero['image'], 'full', false, [ 
                    'loading' => 'eager',
                    'fetchpriority' => 'high',
                    'decoding' => 'async',
                    'class' => ''] ); ?>
            </div>
            <div class="hero--web-design__content hero--web-design__col">
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