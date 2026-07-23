<?php
$heading = get_sub_field( 'heading' );
$content = get_sub_field('content');
$blocks = get_sub_field( 'blocks' );

$attr = buildAttr(array('id'=>$id,'class'=>$classList));
?>

<section <?php echo $attr; ?>>
    <div class="container">
        <div class="web-case-studies__intro text-center">
            <?php if ( ! empty( $heading ) ) : ?>
                <h2 class="web-case-studies__intro-title section-title">
                    <?= $heading; ?>
                </h2>
            <?php endif; ?>
            <?php if ( ! empty( $content ) ) : ?>
                <div class="web-case-studies__intro-content">
                    <?= $content; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="web-case-studies__blocks swiper">
            <div class="swiper-wrapper">
                <?php if ( $blocks ) : ?>
				<?php foreach ( $blocks as $block ) : ?>
					<div class="swiper-slide">
                        <div class="web-case-studies__card">
                            <div class="web-case-studies__card-col">
                                <?php echo wp_get_attachment_image( $block['image']['ID'], 'full', false, [ 'loading' => 'lazy',
                                    'alt' => $block['image']['alt'],
                                    'fetchpriority' => 'auto',
                                    'decoding' => 'async' ] ); ?>
                            </div>
                            <div class="web-case-studies__card-col">
                                <div class="web-case-studies__card-opportunity web-case-studies__card-block">
                                    <h4>Opportunity</h4>
                                    <?= $block['opportunity']; ?>
                                </div>
                                <div class="web-case-studies__card-outcome web-case-studies__card-block">
                                    <h4>Outcome</h4>
                                    <?= $block['outcome']; ?>
                                </div>
                            </div>
                            <?php if($block['link']) : ?>
                                <a href="<?= $block['link']; ?>" class="btn btn--white" target="_blank">
                                    View LIVE Site
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
				<?php endforeach; ?>
			<?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>