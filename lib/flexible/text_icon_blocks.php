<?php
$heading = get_sub_field( 'heading' );
$blocks = get_sub_field( 'blocks' );
$bottom_text = get_sub_field( 'bottom_text' );
$link = get_sub_field( 'cta' );

$attr = buildAttr( array( 'id' => $id, 'class' => $classList ) );
?>

<section <?php echo $attr; ?>>
	<div class="container">
		<?php if ( ! empty( $heading ) ) : ?>
			<div class="text-icon-blocks__intro">
				<h2 class="section-title text-center text-icon-blocks__title">
					<?php echo $heading; ?>
					<?= getSVG( 'curly-arrow', false, false ) ?>
				</h2>
				
			</div>
		<?php endif; ?>
		<div class="text-icon-blocks__block-wrapper">
			<?php if ( $blocks ) : ?>
				<?php foreach ( $blocks as $block ) : ?>
					<div class="text-icon-blocks__block">
						<div class="text-icon-blocks__block-icon">
							<img loading="lazy" src="<?php echo $block['icon']['url']; ?>" alt="">
						</div>
						<div class="col-8 text-icon-blocks__block-content">
							<h3 class="text-icon-blocks__block-title">
								<?php echo $block['title']; ?>
							</h3>
							<?php echo $block['content']; ?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php if ( ! empty( $bottom_text ) ) : ?>
			<p class="section-title text-center text-icon-blocks__title">
				<?php echo $bottom_text; ?>
			</p>
		<?php endif; ?>

		<?php if ( $link ) :
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<div class="text-icon-blocks__cta text-center">
                <a class="btn btn--pink" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                    <?php echo esc_html( $link_title ); ?>
                </a>
            </div>
		<?php endif; ?>


	</div>
</section>