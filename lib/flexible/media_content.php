<?php
$type = get_sub_field( 'type' );
$invert = get_sub_field( 'reverse' );
$preheading = get_sub_field( 'preheading' );
$heading = get_sub_field( 'heading' );
$content = get_sub_field( 'content' );
$image = get_sub_field( 'image' );
$video = get_sub_field( 'video' );


if ( $invert ) {
	$section_attrs['class'][] = 'media-content--reverse';
}
$section_attrs['class'][] = 'media-content media-content--' . $type;
$attr = buildAttr( $section_attrs );
?>

<section <?php echo $attr; ?>>
	<div class="container">
		<div class="media-content__wrapper <?php if ( $invert )
			echo 'reverse'; ?>">
			<div class="row <?php if ( $invert )
				echo 'row--reverse'; ?> ">
				<div class="col col--left col--media">
					<?php if ( ! empty( $heading ) ) : ?>
						<h2 class="mobile-only text-center">
                            <?php echo $heading; ?>
                        </h2>
					<?php endif; ?>

					<?php if ( $type == 'image' ) : ?>
						<div class="media-content__img">
							<?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 'loading' => 'lazy',
								'fetchpriority' => 'auto',
								'decoding' => 'async' ] ); ?>
						</div>
					<?php else : ?>
						<div class="media-content__video">
							<?php // get_template_part( 'lib/parts/video-embed', null, $video ); ?>
							<div class="video-embed">
								<iframe class="lazy" data-src="<?php echo $video; ?>" frameborder="0"></iframe>
							</div>
						</div>
					<?php endif; ?>
				</div>
				<div class="col col--right col--content media-content__content">
					<div class="section__header text-center">

						<?php if ( ! empty( $heading ) ) : ?>
							<h2 class="desk-only"><?php echo $heading; ?></h2>
						<?php endif; ?>

						<?php if ( ! empty( $content ) ) :
							echo $content; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>