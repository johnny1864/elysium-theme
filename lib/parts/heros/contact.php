<style>
	.top-bar {
		background-color: var(--color-blue);
	}
	.top-bar__phone-number {
		color: var(--color-white);
	}
</style>
<section <?php echo $classes; ?> style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/dist/images/contact-hero.webp' ); ?>)">
	<div class="container">
        <div class="hero--contact__row">
            <div class="hero--contact__image hero--contact__col">
                <?php echo wp_get_attachment_image( $hero['image'], 'full', false, [ 
                    'loading' => 'eager',
                    'fetchpriority' => 'high',
                    'decoding' => 'async',
                    'class' => ''] ); ?>
            </div>
            <div class="hero--contact__content hero--contact__col">
                <h1 class="section-title"><?php echo $title; ?></h1>
                <?php if ( ! empty( $hero['subheading'] ) ) : ?>
                    <p class="hero--contact__subheading">
                        <?php echo $hero['subheading']; ?>
                    </p>
                <?php endif; ?>
                <?php if ( ! empty( $hero['content'] ) ) : ?>
                    <div class="hero--contact__text section-content">
                        <?php echo $hero['content']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
	</div>
</section>