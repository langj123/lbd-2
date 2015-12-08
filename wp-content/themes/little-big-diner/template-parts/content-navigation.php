<?php
	global $rest_gift;
	global $rest_menu;
	global $rest_phone;
	global $rest_fb;
	global $rest_twt;
	global $rest_inst;
?>
<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'little-big-diner' ); ?></button>

			<?php
			if (!empty($rest_phone)) {
				echo "<p class='phone-button'><a href='tel:" . $rest_phone . "'>" . $rest_phone . "</a></p>";
			}
			$locations = get_nav_menu_locations();

			$menu_items = wp_get_nav_menu_items($locations['primary']);

			$num = sizeof($menu_items);
			// will be used for position of elements in navigation
			$total_items = (empty($rest_gift_cards) && empty($rest_menu)) ? $num : ((!empty($rest_gift) && !empty($rest_menu)) ? $num + 2 : $num + 1);

			$social_html = (!empty($rest_inst) || !empty($rest_fb) || !empty($rest_twt)) ? "<li class='social'>" : "";

			$social_html .= (!empty($rest_inst)) ? "<a class='social social-inst' href='" . $rest_inst . "' target='_blank'>Instagram</a>" : "";
			$social_html .= (!empty($rest_fb)) ? "<a class='social social-fb' href='" . $rest_fb ."' target='_blank'>Facebook</a>" : "";
			$social_html .= (!empty($rest_twt)) ? "<a class='social social-twt' href='" . $rest_twt . "' target='_blank'>Twitter</a>" : "";

			$social_html .= (!empty($rest_inst) || !empty($rest_fb) || !empty($rest_twt)) ? "</li>" : "";


			$html = "<ul id='Primary-menu'>";

			$x = 0;

			foreach($menu_items as $item) {

				if ($x == 1 && !empty($rest_menu) && empty($rest_gift)) {
					$html .= "<li><a href='" . $rest_menu . "' target='_blank'>Menu</a></li>";
					$html .= "<li><a href='" . $item->url . "'>" . $item->post_title . "</a></li>";
					$html .= $social_html;
				}
				elseif ($x == 1 && !empty($rest_gift) && empty($rest_menu)) {
					$html .= "<li><a href='" . $item->url . "'>" . $item->post_title . "</a></li>";
					$html .= "<li id='Gift-card'><a href='" . $rest_gift . "' target='_blank'>Buy a Gift Card</a></li>";
					$html .= $social_html;
				}
				elseif ($x == 1 && !empty($rest_gift) && !empty($rest_menu)) {
					$html .= "<li><a href='" . $rest_menu . "' target='_blank'>Menu</a></li>";
					$html .= "<li><a href='" . $item->url . "'>" . $item->post_title . "</a></li>";
					$html .= "<li id='Gift-card'><a href='" . $rest_gift . "' target='_blank'>Buy a Gift Card</a></li>";
					$html .= $social_html;
				}
				else {
					$html .= "<li><a href='" . $item->url . "'>" . $item->post_title . "</a></li>";
				}
				$x++; // used for placement of menu link

			}

			$html .= "</ul>";

			echo $html;
			?>
</nav><!-- #site-navigation -->