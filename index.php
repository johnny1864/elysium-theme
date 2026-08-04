<?php get_header(); ?>


<section class="blog__hero">
    <img class="blog__hero-image" src="<?php echo get_template_directory_uri() ?>/dist/images/blog-bg.png" alt="">
    <div class="container text-center">
        <h1>
            <span>
                <?= getSVG('title-circle'); ?>
                Blog
            </span>
        </h1>
    </div>
</section>

<?php
$featured_post = new WP_Query([
    'post_type'           => 'post',
    'posts_per_page'      => 1,
    'ignore_sticky_posts' => true,
]);

$featured_post_id = 0;
if ( $featured_post->have_posts() ) : 
    while ( $featured_post->have_posts() ) :
        $featured_post->the_post();
        ?>
        <section class="section featured-post__section"> 
            <div class="container">
                <?php get_template_part('lib/blocks/featured-post'); ?>
            </div>
        </section>
    <?php
    endwhile;
    wp_reset_postdata();
endif;
?>



<section class="blog-content">
    <div class="container">

        <div class="blog-posts loadmore-container">

            <?php if( have_posts() ):
				while( have_posts() ): the_post();
					get_template_part('lib/parts/post-card');
				endwhile;

				else : ?>
            <h2>No Posts Found</h2>
            <?php endif; ?>

        </div>

        <?php if(have_posts()) //get_template_part('lib/parts/loadmore'); ?>

    </div>
</section>

<?php get_template_part('lib/blocks/email', 'banner'); ?>

<?php get_template_part('lib/layout/flexible'); ?>

<?php get_footer(); ?>