<?php
    $heading = get_sub_field( 'heading' );
    $blocks = get_sub_field('blocks');
    $bottom_text = get_sub_field( 'bottom_text' );

    $attr = buildAttr(array('id'=>$id,'class'=>$classList));
?>

<section <?php echo $attr; ?>>
    <div class="container">
        <?php if ( ! empty( $heading ) ) : ?>
            <h2 class="section-title text-center text-icon-blocks__title">
                <?php echo $heading; ?>
            </h2>
        <?php endif; ?>
        <div class="text-icon-blocks__block-wrapper">
            <?php if($blocks) :?>
                <?php foreach($blocks as $block) : ?>
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
    </div>
</section>