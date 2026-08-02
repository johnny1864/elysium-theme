<?php get_header(); ?>
<div class="single-post__spacer">
    <img class="single-post__spacer-image" src="<?php echo get_template_directory_uri() ?>/dist/images/blog-bg.png" alt="">
</div>
<section class="page-content single-post__content">
    <div class="container">
       <a href="/blog" class="back-button btn">
        <?= getSVG('back-arrow'); ?>
        Back To Blog
       </a>

        <?php if( have_posts() ): ?>
           <?php while( have_posts() ): the_post(); ?>
                <div class="single-post__intro">
                    <h1 class="single-post__title"><?php the_title(); ?></h1>
                    <div class="single-post__date">
                        <?php echo getSVG('calendar'); ?>
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date( 'F j, Y' ) ); ?>
                        </time>
                    </div>
                </div>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
        <div class="cta">
            <a href="/contact" class="btn btn--pink">
                Get Started
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>