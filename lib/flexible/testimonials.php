<?php
$heading_thin = get_sub_field( 'heading_thin' );
$heading_bold = get_sub_field( 'heading_bold' );
$quote_text = get_sub_field( 'quote_text' );
$slides = get_sub_field( 'slides' );
?>

<style>

    .testimonial-slider {
        width: 100%;
        max-width: 550px;
    }

    .stack {
        position: relative;
        height: 700px;
        perspective: 1000px;
        margin: 4rem 0 1rem;
    }

    .card {
        position: absolute;
        inset: 0;
        transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1),
                    opacity 0.5s ease;
        cursor: pointer;
        user-select: none;
    }

    .card::before {
        content: "";
        position: absolute;
        inset: 0;
        height: 100%;
        width: 100%;
        background-color: rgba(0,0,0,0.1);
        border-radius: 2rem;
        filter: blur(1.5rem);
        box-shadow: 0 20px 20px rgba(0,0,0,0.15);
    }

    /* Stacking positions */
  .card[data-pos="0"] {
    transform: translateX(-15%) translateY(-5%) scale(1) rotate(-5deg);
    opacity: 1;
    z-index: 4;
  }
  .card[data-pos="1"] {
    transform: translateY(10%) scale(0.94) rotate(10deg);
    
    z-index: 3;
  }
  .card[data-pos="2"] {
    transform: translateY(-32px) scale(0.88);
    
    z-index: 2;
  }
  .card[data-pos="3"] {
    transform: translateY(-48px) scale(0.82);
    opacity: 0;
    z-index: 1;
    pointer-events: none;
  }
 
  .dots {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
    margin-top: 1.5rem;
  }
 
  .dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: var(--color-turquoise-blue);
    border: none;
    padding: 0;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
    z-index: 20;
    opacity: 0.5;
  }
 
  .dot.active {
    background: var(--color-turquoise-blue);
    opacity: 1;
  }


  @media screen and (max-width: 749px) {
    .testimonial-slider {
        max-width: 350px;
    }

    .stack {
        height: 450px;
        transform: translate(10%);
    }

  }

</style>

<section class="testimonials">
	<div class="container testimonials__container">
		<div class="testimonials__top">
			<?php if ( $heading_thin || $heading_bold ) : ?>
				<p class="testimonials__eyebrow">
					<?php echo esc_html( $heading_thin ); ?>
					<?php if ( $heading_bold ) : ?>
						<strong><?php echo esc_html( $heading_bold ); ?></strong>
					<?php endif; ?>
				</p>
			<?php endif; ?>
		</div>

		<div class="testimonials__content">
			<div class="testimonials__intro">
				<div class="testimonials__quote-mark">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/testimonial-qoute.svg' ); ?>"
						alt="Quote icon" />
				</div>

				<?php if ( $quote_text ) : ?>
					<h2 class="testimonials__heading">
						<?php echo esc_html( $quote_text ); ?>
					</h2>
				<?php endif; ?>

				<div class="testimonials__scribble">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/testimonial-line.svg' ); ?>"
						alt="" aria-hidden="true" />
				</div>
			</div>

			<?php if ( $slides ) : ?>
				<div class="testimonial-slider">
					<div id="stack" class="card-slider-wrap stack">
						<!-- <div class="card-slider"> -->
                        <?php foreach ( $slides as $index => $slide ) : ?>
                            <div class="slider-card card">
                                <div class="testimonial-slider__card">
                                    <?php
                                    echo wp_get_attachment_image(
                                        $slide['bg_image']['ID'],
                                        'xl',
                                        false,
                                        [
                                            'class' => 'testimonial-slider__card-bg-image',
                                            'alt' => esc_attr( $slide['bg_image']['alt'] ?: 'Testimonial ' . ( $index + 1 ) ),
                                            'loading' => 'lazy',
                                        ]
                                    );
                                    ?>
                                    <img class="testimonial-slider__card-frame"
                                        src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/picture-frame.webp' ); ?>"
                                        alt="">
                                    <div class="testimonial-slider__card-content">
                                        <img class="testimonial-slider__card-stars"
                                            src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/stars.png' ); ?>"
                                            alt="">
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
						<!-- </div> -->
					</div>
					<div id="card-dots" class="card-dots dots"></div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<script defer>
	document.addEventListener("DOMContentLoaded", () => {
		const stack = document.getElementById('stack');
		const dotsEl = document.getElementById('card-dots');
		const cards = Array.from(stack.children);
		let active = 0;

		// Build dots
		cards.forEach((_, i) => {
			const dot = document.createElement('button');
			dot.className = 'dot';
			dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
			dot.addEventListener('click', () => goTo(i));
			dotsEl.appendChild(dot);
		});
		const dots = Array.from(dotsEl.children);

		function render() {
			cards.forEach((card, i) => {
				const pos = (i - active + cards.length) % cards.length;
				card.dataset.pos = Math.min(pos, 3);
			});
			dots.forEach((d, i) => d.classList.toggle('active', i === active));
		}

		function goTo(i) {
			active = i;
			render();
		}

		// Tap top card to advance
		stack.addEventListener('click', (e) => {
			if (e.target.closest('.card')?.dataset.pos === '0') {
				goTo((active + 1) % cards.length);
			}
		});

		render();
	});
</script>