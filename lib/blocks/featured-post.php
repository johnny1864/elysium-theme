<?php
$thumbnail_id = get_field( 'blog', 'option' )['default_thumbnail']['ID'];

if ( ! empty( get_post_thumbnail_id() ) )
	$thumbnail_id = get_post_thumbnail_id();

// $feat_img = getIMG($thumbnail_id, 'lg');
$permalink = get_the_permalink();
?>

<article class="featured-post" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/dist/images/featured-post-bg.webp' ); ?>)">
	<div class="featured-post__wrapper">
		<a class="featured-post__thumb" href="<?php echo $permalink; ?>">
			<div class="positioner">
				<?php
				echo wp_get_attachment_image($thumbnail_id, 'xl',
					false,
					[
						'class' => '',
						'loading' => 'lazy',
					]
				);
				?>
			</div>
		</a>
		<div class="featured-post__content">
			<h3 class="featured-post__feature gradiant-text">Featured</h3>
			<h4 class="featured-post__title">
				<?php the_title(); ?>
			</h4>
            
			<p class="featured-post__excerpt">
				<?php
					echo limit(get_the_content(), 60, false);
				?>
			</p>
			<a class="btn btn--white" href="<?php echo $permalink; ?>">
				Read More
			</a>
		</div>
	</div>
</article>