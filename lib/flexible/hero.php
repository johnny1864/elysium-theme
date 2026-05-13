<?php
$mobile_image_id = get_sub_field( 'mobile_image' )['ID'];
$mobile_image_url = get_sub_field( 'mobile_image' )['url'];
?>

<section class="hero">
	<div class="hero__bg">
		<?php
		$background_image = get_sub_field( 'background_image' );
		if ( ! empty( $background_image ) ) {
			echo wp_get_attachment_image( $background_image, 'full', false, [
				'loading' => 'eager',
				'decoding' => 'async'
			] );
		}
		?>
	</div>


	<?php if ( ! empty( $mobile_image_id ) ) : ?>
		<div class="hero__mobile-image mobile-only">
			<?php
			echo wp_get_attachment_image(
				$mobile_image_id,
				'large',
				false,
				[ 'loading' => 'eager',
					'fetchpriority' => 'high',
					'decoding' => 'async' ]
			);
			?>
		</div>
	<?php endif ?>
	<div class="container">
		<div class="hero__content">

			<?php if ( $headline = get_sub_field( 'headline' ) ) : ?>
				<span class="hero__intro-text preheading">
					<?php echo esc_html( $headline ); ?>
				</span>
			<?php endif; ?>

			<?php if ( $gradient_text = get_sub_field( 'gradient_text' ) ) : ?>
				<h2 class="hero__title gradient-text">
					<?php echo esc_html( $gradient_text ); ?>
				</h2>
			<?php endif; ?>

			<?php if ( $content = get_sub_field( 'content' ) ) : ?>
				<div class="hero__highlight-text">
					<?php echo wp_kses_post( $content ); ?>
				</div>
			<?php endif; ?>

			<p class="hero__bottom-text">Now, the best brands do too.</p>

			<a href="#form-block" class="btn btn--white">Let’s talk</a>
			<!-- <img class="hero__video-arrow"
				src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/video-arrow.svg' ); ?>" alt=""
				aria-hidden="true" loading="lazy" /> -->
		</div>

		<div class="hero__video-spacer desk-only"></div>
	</div>

	<div class="hero__video-wrapper desk-only">
		<?php
		$video_mp4 = get_sub_field( 'video_mp4' );
		$video_webm = get_sub_field( 'video_webm' );
		$video_poster = get_sub_field( 'video_poster' );
		?>

		<?php if ( $video_mp4 || $video_webm ) : ?>
			<div class="hero__video">
				<video autoplay loop muted playsinline preload="metadata"
					poster="<?php echo $video_poster ? esc_url( $video_poster ) : $mobile_image_url; ?>">
					<?php if ( $video_webm ) : ?>
						<source src="<?php echo esc_url( $video_webm ); ?>" type="video/webm">
					<?php endif; ?>
					<?php if ( $video_mp4 ) : ?>
						<source src="<?php echo esc_url( $video_mp4 ); ?>" type="video/mp4">
					<?php endif; ?>
				</video>
				<?php echo getSVG('hero-crop', false, false); ?>
			</div>
			
		<?php endif; ?>		
	</div>
</section>