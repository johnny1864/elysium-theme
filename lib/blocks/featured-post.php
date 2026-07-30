<?php
$thumbnail_id = get_field( 'blog', 'option' )['default_thumbnail']['ID'];

if ( ! empty( get_post_thumbnail_id() ) )
	$thumbnail_id = get_post_thumbnail_id();

// $feat_img = getIMG($thumbnail_id, 'lg');
$permalink = get_the_permalink();
$categories = get_the_category();
$first_category = ! empty( $categories ) ? $categories[0] : null;
?>

<article class="featured-post">
	<div class="wrapper">
		<a class="featured-post__thumb" href="<?php echo $permalink; ?>">
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
		<div class="featured-post__content">
			<h4 class="featured-post__title">
				<?php the_title(); ?>
			</h4>
            
			<p class="featured-post__excerpt">
				<?php
				echo limit( get_the_content(), 35 );
				if ( ! empty( get_the_excerpt() ) ) {
					echo excerpt( 30 );
				} else {
					echo limit( get_the_content(), 35 );
				}
				?>
			</p>
			<a class="btn btn--white" href="<?php echo $permalink; ?>">
				Read More
			</a>
		</div>
	</div>
</article>