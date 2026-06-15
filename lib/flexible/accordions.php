<?php
$bg_image = get_sub_field('bg_image');
$accordions = get_sub_field( 'accordions' );
$group = 'accordion_block';
?>

<section class="accordions-block">
    <?php if(!empty($bg_image)) : ?>
        <?php echo wp_get_attachment_image( $bg_image['ID'], 'full', false, [ 'loading' => 'lazy',
            'class' => 'accordions-block__bg-image',
            'fetchpriority' => 'auto',
            'decoding' => 'async' ] ); ?>
    <?php else : ?>
    <img loading="lazy" class="accordions-block__bg-image" src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/accordions-bg.webp' ); ?>" alt="">
    <?php endif ?>
	<div class="container">
		<div class="accordions-block__wrapper">
			<?php foreach ( $accordions as $index => $accordion ) : ?>
                <?php 
                    $accordion = $accordion['accordion'];
                    $title = $accordion['title'];
                    $subtitle = $accordion['subtitle'];
                    $content = $accordion['content'];
                ?>
				<div class="accordion" data-group="<?php echo $group; ?>">
					<button class="accordion__trigger" type="button">
						<div class="accordion__label">
                            <p class="accordion__title">
                                <?= $title; ?>
                                <span class="icon-plus">+</span>
                                <?php if(empty($subtitle)) echo getSVG('title-underline', false, false); ?>
                            </p>
                            <?php if(!empty($subtitle)) : ?>
                                <span class="accordion__subtitle">
                                    <?= $subtitle; ?>
                                    <?= getSVG('underline', false, false); ?>
                                </span>
                            <?php endif; ?>
                        </div>
						
					</button>
					<div class="accordion__content"><?php echo $content; ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>