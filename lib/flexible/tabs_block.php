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
        <div class="tabs-block__nav">
            <?php foreach($tabs as $index => $tab) : ?>
                <?php 
                $tab = $tab['tab'];
                $title = $tab['title'];
                $label = $tab['nav_label'];

                if(empty($label)) $label = $title;
                ?>
                <?php if(!empty($label)) : ?>
                    <button data-tab="<?php echo handleize($title); ?>" class="btn btn--white tabs-block__nav-item <?php if($index ==  0) : ?>active<?php endif; ?>">
                        <?= $label; ?>
                    </button>
                <?php endif; ?>
            <?php endforeach; ?>
            <div class="tabs-block__nav-prev tabs-block__nav-arrow">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/brands-prev.svg'); ?>" alt=""
                    aria-hidden="true" />
            </div>

            <div class="tabs-block__nav-next tabs-block__nav-arrow">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/dist/images/brands-next.svg'); ?>" alt=""
                    aria-hidden="true" />
            </div>
        </div>
        <div class="tabs-block__panels">
        <?php foreach($tabs as $index => $tab) : ?>
            <?php 
                $tab = $tab['tab'];
                $title = $tab['title'];
                $subtitle = $tab['subtitle'];
                $content = $tab['content'];
                $image = $tab['image'];
                $right_text = $tab['right_text'];
                $cta = $tab['cta'];
            ?>
            <div id="<?php echo handleize($title); ?>" class="tabs-block__panel <?php if($index ==  0) : ?>active<?php endif; ?>">
                <div class="tabs-block__card">
                    <div class="tabs-block__card-intro text-center">
                        <?php if(!empty($title)) : ?>
                            <h3 class="tabs-block__card-title">
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
                        <div class="tabs-block__card-row">
                            <?php if(!empty($image)) : ?>
                                <div class="tabs-block__card-image">
                                    <?php echo wp_get_attachment_image( $image['ID'], 'full', false, [ 'loading' => 'lazy',
                                    'alt' => $image['alt'],
                                    'fetchpriority' => 'auto',
                                    'decoding' => 'async' ] ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($right_text)) : ?>
                                <div class="tabs-block__card-right-text">
                                    <?= $right_text; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php if ($cta): ?>
                            <div class="text-center">
                                <a href="<?php echo esc_url($cta['url']); ?>" class="btn btn--white"
                                    target="<?php echo esc_attr($cta['target'] ?: '_self'); ?>">
                                    <?php echo esc_html($cta['title']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>