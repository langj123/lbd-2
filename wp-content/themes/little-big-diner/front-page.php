<?php
/**
 * Home Page
 */

// used for generating our gallery, which is dispersed throughtou the page
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="col-lg-12">
				<div class="col-lg-6">
					<div class="gallery-cont gallery-ls">
						<img src="<?php echo $gallery[2]['url']; ?>" />
					</div><!-- gallery-cont -->
					<div class="feature-sect">
						<?php
							if (function_exists('get_field')) {
								echo get_field('restaurant_about');
							}
						?>
					</div>
				</div><!-- col-lg-6 -->
				<div class="col-lg-6 col-alt">
					<div class="gallery-cont gallery-sq">
					</div><!-- gallery-cont -->
					<div>
						<?php
							if (function_exists('get_field')) {
								echo get_field('rest_address');
							}
						?>
					</div>
				</div><!-- col-lg-6 -->
			</div><!-- col-lg-12 -->
			<div class="col-lg-12">
				<div class="col-lg-6">

				</div><!-- col-lg-6 -->
				<div class="col-lg-3">
				</div><!-- col-lg -->
				<div class="col-lg-3">
				</div><!-- col-lg-3 -->
			</div><!-- col-lg-12 -->
			<div class="col-lg-12">
				<div class="gallery-cont gallery-ls">
				</div><!-- gallery-cont -->
			</div><!-- col-lg-12 -->
			<div class="col-lg-12">
				<div class="col-lg-6">
					<?php
						if (function_exists('get_field')) {
							echo get_field('rest_address');
						}
					?>
				</div><!-- col-lg-6 -->
				<div class="col-lg-6">
					<?php
						if (function_exists('get_field')) {
							echo get_field('hours');
						}
					?>
				</div><!-- col-lg-6 -->
			</div><!-- col-lg-12 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
