<?php
    $thumbnail_id = get_field('blog', 'option')['default_thumbnail']['ID'];

    if(!empty(get_post_thumbnail_id())) $thumbnail_id = get_post_thumbnail_id();

    // $feat_img = getIMG($thumbnail_id, 'lg');
    $permalink = get_the_permalink();
    $categories     = get_the_category();
    $first_category = ! empty( $categories ) ? $categories[0] : null;
?>

<article class="post-card">
    <a class="post-card__thumb" href="<?php echo $permalink; ?>">
        <div class="positioner">
            <?php
            echo wp_get_attachment_image(
                $thumbnail_id,
                'xl',
                false,
                [
                    'class' => '',
                    'loading' => 'lazy',
                ]
            );
            ?>                 
        </div>
    </a>
    <div class="post-card__content">
        <h4 class="post-card__title"><?php the_title(); ?></h4>
        <div class="post-card__meta">
            <span class="post-card__author">
                By <?php echo esc_html( get_the_author() ); ?>
            </span>
            <span aria-hidden="true">|</span>
            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
            </time>
            <?php if ( $first_category ) : ?>
                <!-- <span aria-hidden="true">|</span>

                <a href="<?php echo esc_url( get_category_link( $first_category->term_id ) ); ?>">
                    <?php echo esc_html( $first_category->name ); ?>
                </a> -->
            <?php endif; ?>
        </div>
        <p class="post-card__excerpt">
            <?php
                echo limit(get_the_content(), 35, true);
            ?>
        </p>
        <a class="post-card__link btn btn--arrow" href="<?php echo $permalink; ?>">
            Read More
            <?= getSVG('btn-arrow'); ?>
        </a>
    </div>
</article>