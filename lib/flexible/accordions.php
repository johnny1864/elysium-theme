<?php
$accordions = get_sub_field( 'accordions' );
$group = 'accordion_block';
?>

<section class="accordions-block">
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