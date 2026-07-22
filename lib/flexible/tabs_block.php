<?php
$bg_image = get_sub_field('bg_image');
$tabs = get_sub_field('tabs');
?>

<section class="tabs-block">
    <?php if(!empty($bg_image)) : ?>
        <?php echo wp_get_attachment_image( $bg_image['ID'], 'full', false, [ 'loading' => 'lazy',
            'class' => 'tabs-block__bg-image',
            'fetchpriority' => 'auto',
            'decoding' => 'async' ] ); ?>
    <?php else : ?>
    <img loading="lazy" class="accordions-block__bg-image" src="<?php echo esc_url( get_template_directory_uri() . '/dist/images/accordions-bg.webp' ); ?>" alt="">
    <?php endif ?>
    <div class="container">
        <div class="tabs-block__panels">
        <?php foreach($tabs as $index => $tab) : ?>
            <?php 
                $tab = $tab['tab'];
                $title = $tab['title'];
                $subtitle = $tab['subtitle'];
                $content = $tab['content'];
            ?>
            <div class="tabs-block__panel">
                <div class="tabs-block__card">
                    <div class="tabs-block__card-intro text-center">
                        <?php if(!empty($title)) : ?>
                            <h3 class="title">
                                <?= $title; ?>
                            </h3>
                        <?php endif; ?>
                        <?php if(!empty($subtitle)) : ?>
                            <span class="tabs-block__card-subtitle">
                                <?= $subtitle; ?>
                                <?= getSVG('underline', false, false); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="tabs-block__card-body">
                        <?= $content; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>