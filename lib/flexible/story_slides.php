<?php
$eyebrow = get_sub_field( 'eyebrow_text' );
$heading = get_sub_field( 'heading' );
$stories = get_sub_field( 'stories' );
?>

<section class="story-slides">
	<div class="story-slides__wrapper container">

		<div class="story-slides__intro text-center">
			<?php if ( $eyebrow || $heading ) : ?>
				<span class="story-slides__intro-preheading">
					<?php echo esc_html( $eyebrow ); ?>
				</span>
			<?php endif; ?>
			<?php if ( $heading ) : ?>
				<h2 class="story-slides__intro-heading">
					<?php echo esc_html( $heading ); ?>
				</h2>
			<?php endif; ?>
		</div>

		<?php if ( $stories ) : ?>
			<div class="swiper">
				<div class="swiper-wrapper">

					<?php foreach ( $stories as $index => $slide ) : ?>

						<?php

						$card_image = $slide['card_image'] ?? '';
						$card_title = $slide['card_title'] ?? '';
						$card_body = $slide['card_body'] ?? '';
						?>

						<div class="swiper-slide">
							<div class="swiper-slide__container">
								<div class="story-slides__image-area story-slides__card">

									<?php if ( $card_image ) : ?>
										<div class="story-slides__image story-slides__card-image">
											<?php echo wp_get_attachment_image( $card_image, 'full', false, [
												'loading' => 'lazy',
												'fetchpriority' => 'auto',
												'decoding' => 'async' ] ); ?>
										</div>
									<?php endif; ?>

									<div class="story-slides__image-content story-slides__card-text-box">
										<div>
											<?php if ( $card_title ) : ?>
												<h4 class="story-slides__card-title">
													<?php echo esc_html( $card_title ); ?>
												</h4>
											<?php endif; ?>

											<?php if ( $card_body ) : ?>
												<div class="story-slides__card-content">
													<?php echo wp_kses_post( $card_body ); ?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>

					<?php endforeach; ?>

				</div>
				<!-- Pagination -->
				<div class="swiper-pagination"></div>
			</div>

			<!-- <div class="story-slides__panels desk-only">
				<div class="story-slides__track">

					<?php
					/*
					 foreach ( $stories as $index => $slide ) : ?>

						<?php
						$heading = $slide['heading'] ?? '';
						$content = $slide['content'] ?? '';
						$cta = $slide['cta'] ?? '';
						$card_image = $slide['card_image'] ?? '';
						$card_title = $slide['card_title'] ?? '';
						$card_body = $slide['card_body'] ?? '';
						$bg_color = $slide['bg_color'];
						?>

						<div class="story-slides__panel" data-bg="<?php echo $bg_color; ?>" style="--bg-color:<?php echo $bg_color; ?>">
							<div class="story-slides__panel--inner">
								<div class="swiper-slide__container">
									<div class="story-slides__content <?php if ( $index != 0 ) : ?><?php endif; ?>">

										<?php if ( $heading ) : ?>
											<h3
												class="story-slides__content-heading <?php if ( $index != 0 ) : ?>reveal<?php endif; ?>">
												<?php echo esc_html( $heading ); ?>
											</h3>
										<?php endif; ?>

										<?php if ( $content ) : ?>
											<div class="story-slides__content-text <?php if ( $index != 0 ) : ?>reveal<?php endif; ?>">
												<?php echo wp_kses_post( $content ); ?>
											</div>
										<?php endif; ?>

										<?php if ( $cta ) : ?>
											<a href="<?php echo esc_url( $cta['url'] ); ?>"
												class="btn btn--white <?php if ( $index != 0 ) : ?>reveal<?php endif; ?>"
												target="<?php echo esc_attr( $cta['target'] ?: '_self' ); ?>">
												<?php echo esc_html( $cta['title'] ); ?>
											</a>
										<?php endif; ?>

										<?php
										$label = $slide['card_title'] ?: $slide['heading'];
										?>
										<div class="custom-bullet__wrapper <?php if ( $index != 0 ) : ?>reveal<?php endif; ?>">
											<div class="custom-bullet active" data-index="<?php echo esc_attr( $index ); ?>">
												<span class="bullet-number">
													<?php echo esc_html( str_pad( $index + 1, 2, '0', STR_PAD_LEFT ) ); ?>
													<?php if ( $label ) : ?>
														<span class="bullet-label">
															<?php echo esc_html( $label ); ?>
														</span>
													<?php endif; ?>
												</span>
												<span class="bullet-line"></span>
											</div>
										</div>

									</div>

									<div class="story-slides__image-area">

										<?php if ( $card_image ) : ?>
											<div class="story-slides__image">
												<?php echo wp_get_attachment_image( $card_image, 'full', false, [ 'loading' => 'lazy',
													'fetchpriority' => 'auto',
													'decoding' => 'async' ] ); ?>
											</div>
										<?php endif; ?>

										<div class="story-slides__image-content">

											<?php if ( $card_title ) : ?>
												<h4 class="story-slides__card-title <?php if ( $index != 0 ) : ?>reveal<?php endif; ?>">
													<?php echo esc_html( $card_title ); ?>
												</h4>
											<?php endif; ?>

											<?php if ( $card_body ) : ?>
												<div
													class="story-slides__card-content <?php if ( $index != 0 ) : ?>reveal<?php endif; ?>">
													<?php echo wp_kses_post( $card_body ); ?>
												</div>
											<?php endif; ?>

										</div>
									</div>

								</div>

							</div>
						</div>

					<?php endforeach; */ ?>

				</div>
			</div> -->
		<?php endif; ?>
	</div>
</section>