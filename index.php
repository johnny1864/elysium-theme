<?php get_header(); ?>

<section class="blog__hero">
    <img class="blog__hero-image" src="<?php echo get_template_directory_uri() ?>/dist/images/blog-bg.png" alt="">
    <div class="container text-center">
        <h1>Blog</h1>
    </div>
</section>

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

        <?php if(have_posts()) get_template_part('lib/parts/loadmore'); ?>

    </div>
</section>

<?php get_template_part('lib/blocks/email', 'banner'); ?>

<?php get_template_part('lib/layout/flexible'); ?>

<?php get_footer(); ?>