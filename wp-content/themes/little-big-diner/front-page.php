<?php
/**
 * Home Page
 */
if (function_exists('get_field')) {
	$gallery = get_field('gallery_of_images');
	$images = lbd_gallery_gen($gallery, 5);
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


		<div class="col-lg-12 col-main col-main-alt">
			<div class="col-lg-6 col-alt">
				<div class="gallery-cont gallery-ls gallery-spec">

					<?php if ($images[0]) { ?>
					<a class="fancybox" href="<?php echo $images[0]['url']; ?>">
						<img src="<?php echo $images[0]['sizes']['lbd-landscape']; ?>" />
					</a>
					<?php } ?>

				</div><!-- gallery-cont -->
				<div id="About-sect" class="rows info-sect">

					<?php
						if (function_exists('get_field') && !empty($rest_about)) {
							echo "<blockquote>" . $rest_about . "</blockquote>";
						}
					?>

				</div>
			</div><!-- col-lg-6 -->
			<div class="col-lg-6 info-sect">
				<div class="gallery-cont gallery-por">

					<?php if ($images[1]) { ?>
					<a class="fancybox" href="<?php echo $images[1]['url']; ?>">
						<img src="<?php echo $images[1]['sizes']['lbd-portrait']; ?>" />
					</a>
					<?php } ?>

				</div><!-- gallery-cont -->
				<div class="rows rows-alt menu-sect">
					<?php if (!empty($rest_menu)) { ?>
						<p><a href="<?php echo $rest_menu; ?>" class="btn-link-alt" target="_blank">View Menu</a></p>
					<?php } ?>
				</div>
			</div><!-- col-lg-6 -->
		</div>


		<div class="col-lg-12 col-main col-alt4">
			<div class="col-lg-6">
					<div class="rows gallery-cont gallery-ls">
						<?php if ($images[2]) { ?>
						<a class="fancybox" href="<?php echo $images[2]['url']; ?>">
							<img src="<?php echo $images[2]['sizes']['lbd-landscape']; ?>" />
						</a>
						<?php } ?>
					</div><!-- gallery-cont -->
			</div><!-- .col-lg-6 -->
			<div class="col-lg-3">
					<div class="rows">
						<?php get_template_part('template-parts/content', 'octie');?>
					</div><!-- .col -->
			</div><!-- .col-lg-3 -->
			<div class="col-lg-3">
					<div class="gallery-cont gallery-por">
						<?php if ($images[3]) { ?>
						<a class="fancybox" href="<?php echo $images[3]['url']; ?>">
									<img src="<?php echo $images[3]['sizes']['lbd-portrait']; ?>" />
						</a>
						<?php } ?>
					</div><!-- .col -->
			</div><!-- .col-lg-3 -->

		</div><!-- col-lg-12 -->

		<div class="col-lg-12">
					<div class="rows gallery-cont gallery-ls">
						<?php if ($images[4]) { ?>
						<a class="fancybox" href="<?php echo $images[4]['url']; ?>">
							<img src="<?php echo $images[4]['sizes']['lbd-landscape']; ?>" />
						</a>
						<?php } ?>
					</div><!-- gallery-cont -->
		</div><!-- .col-lg-12 -->

		<div id="Contact-sect" class="col-lg-12 info-sect-alt">
			<div class="col-lg-6 col-alt2">
					<div class="rows info-sect">
						<?php if (!empty($rest_address)) { ?>
							<address>
								<?php echo  "<p>" . $rest_address . "<br />"; ?>
								<?php if (!empty($rest_city)) { 
									echo $rest_city . "</p>";
								} ?>
								<?php if (!empty($rest_phone)) { 
									echo "<p>" . $rest_phone . "<br />";
								} ?>
								<?php if (!empty($rest_email)) { 
									echo "<a href=\"mailto:" . $rest_email . "\" class=\"alt-link\">" . $rest_email . "</a></p>";
								} ?>
							</address>
						<?php } ?>
					</div><!-- gallery-cont -->
			</div><!-- .col-lg-6 -->

			<div class="col-lg-6">
				<div class="col-lg-6 col-alt3">
					<div class="rows info-sect">
							<?php if (!empty($rest_hours)) { ?>
									<h3>Hours</h3>
									<?php echo "<p>" . $rest_hours . "</p>"; ?>
							<?php } ?>
							<?php if (!empty($rest_hire) && $rest_hiring === true) { ?>
									<h3>Want to work with us?</h3>
									<?php echo "<p>Send your resume to: <br /><a href='mailto:" . $rest_hire . "'>" . $rest_hire . "</a></p>"; ?>
							<?php } ?>
					</div>
				</div><!-- col-lg-3 -->
		
				<div id="Lets-noodle-cont" class="col-lg-6 col-alt3">
					<div class="rows info-sect">
							<?php get_template_part('template-parts/content', 'octie-noodle' ); ?>
					</div>
				</div><!-- .col-lg-3 -->
			</div><!-- col-lg-6 -->
		</div><!-- .col-lg-12 -->




		<?php if ($gallery) { ?>
		<div class="gallery-list">
			<?php for ($x=0; $x < sizeof($gallery); $x++) {
				echo "<a href=\"" . $gallery[$x]['url'] . "\"><img src=\"" . $gallery[$x]['sizes']['thumbnail'] . "\" /></a>";
			}?>
		</div>
		<?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
