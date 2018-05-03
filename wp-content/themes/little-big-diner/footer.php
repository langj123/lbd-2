<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Little_Big_Diner
 */
$sister_restaurants = get_field('sister_restaurants_list');

?>

	</div><!-- #content -->

	<?php if (sizeof($sister_restaurants) > 0) { ?>
		<div class="sister-restaurants">
			<h3>Also visit our sister restaurants locally&hellip;</h3>
			<ul class="rest-list">
			<?php
				$list = '';
				for ($x=0; $x < sizeof($sister_restaurants); $x++) {
					$s_rest_name = $sister_restaurants[$x]['restaurant_name'];
					$s_rest_street = $sister_restaurants[$x]['restaurant_street'];
					$s_rest_zip = $sister_restaurants[$x]['restaurant_zip'];
					$s_rest_state = $sister_restaurants[$x]['restaurant_state'];
					$s_rest_city = $sister_restaurants[$x]['restaurant_city'];
					$s_rest_logo = $sister_restaurants[$x]['restaurant_logo'];
					$s_rest_site = $sister_restaurants[$x]['restaurant_website'];

					$list .= '<li class="rest-item">';
					$list .= '<a href="' . $s_rest_site . '" class="logo-link"><img src="' . $s_rest_logo . '" /></a>';
					$list .= '<div class="rest-info">';
					$list .= '<address>';
					$list .= '<p>' . $s_rest_street . '<br />' . $s_rest_city . ', ' . $s_rest_state . ' ' . $s_rest_zip  . '</p>';
					$list .= '<a href="' . $s_rest_site . '" class="rest-link" target="_blank">Visit Website</a>';
					$list .= '</address>';
					$list .= '</div>';
					$list .= '</li>';
				}
				echo $list;
			?>
			</ul><!-- .rest-list -->
		</div><!-- .sister-restaurants -->
		<?php } ?>

	<div id="colophon" class="col-lg-12 site-footer" role="contentinfo">
		<div class="col-lg-6">
			<div class="site-info">
				<p>&copy; 2016 Little Big Diner</p>
			</div><!-- .site-info -->
		</div>	<div class="col-lg-6">
			<div class="site-info">
				<p><a href="http://icscreative.com/" target="_blank">Site By ICS</a></p>
			</div><!-- .site-info -->
		</div>
	</div><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
