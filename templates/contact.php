<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<?php if( have_posts() ):
	while( have_posts() ): the_post();
		get_template_part('lib/blocks/contact');
	endwhile;
endif; ?>

<?php get_footer(); ?>