<?php
/**
 * Template Name: Overview Page
 *
 */
if (function_exists('get_field')) :
	$gallery = get_field('gallery_of_images');
endif;
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="col-lg-6">
				<div class="gallery-cont">
					<img src="<?php echo $gallery[2]['url']; ?>" />
				</div><!-- gallery-cont -->
				<div>
						Little Big Diner xyz ... This is the about copy. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Lorem ipsum dolor sit amet, consectetur adipiscing eli
				</div>
			</div><!-- col-lg-6 -->
			<div class="col-lg-6">
				<div class="gallery-cont gallery-square">
					<img src="<?php echo $gallery[2]['url']; ?>" />
				</div><!-- gallery-cont -->
				<div>
						Little Big Diner xyz ... This is the about copy. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. Lorem ipsum dolor sit amet, consectetur adipiscing eli
				</div>
			</div><!-- col-lg-6 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
