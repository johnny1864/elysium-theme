<?php
$heading = get_sub_field( 'heading' );
$content = get_sub_field('content');
$blocks = get_sub_field( 'blocks' );

$attr = buildAttr(array('id'=>$id,'class'=>$classList));
?>

<section <?php echo $attr; ?>>
    <div class="container">
        <div class="text-icon-blocks__intro">
            <?php if ( ! empty( $heading ) ) : ?>
            <h2 class="web-case-studies__intro-title">
                <?= $heading; ?>
            </h2>
            <?php endif; ?>
            <?php if ( ! empty( $content ) ) : ?>
                <div class="web-case-studies__intro-content">
                    <?= $content; ?>
                </div>
            <?php endif; ?>
        </div>
		
    </div>
</section>