<section <?php echo $classes; ?>>
    <div class="container">
        <div class="hero--basic__content">
            <h1 class="hero--basic__title"><?php echo $title; ?></h1>
            <?php if(!empty($hero['content'])):?>
            <div class="hero--basic__text"><?php echo $hero['content'];  ?></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="hero--basic__image">
        <?php echo wp_get_attachment_image( $hero['image'], 'full', false, [ 'loading' => 'eager',
                            'fetchpriority' => 'high',
                            'decoding' => 'async' ] ); ?>
    </div>
</section>