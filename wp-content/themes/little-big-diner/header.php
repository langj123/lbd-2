<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Little_Big_Diner
 */
if (function_exists('get_field')) {
	// these globals are used to retrieve data from whatever page is set to homepage
	global $rest_menu;
	global $rest_address;
	global $rest_hours;
	global $rest_city;
	global $rest_about;
	global $rest_phone;
	global $rest_email;
	global $rest_gift;
	global $rest_hire;
	global $rest_hiring;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=9">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/images/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/icons/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/images/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php if (wp_is_mobile()) { echo "mobile"; }?>">

	<header id="masthead" class="site-header" role="banner">
		<?php get_template_part('template-parts/content', 'navigation'); ?>
		
		<div class="site-branding">
			<?php get_template_part('template-parts/content', 'logo' );?>

			<?php if (!empty($rest_address) || !empty($rest_city)) { ?>
				<address><?php echo $rest_address . " " . $rest_city; ?></address>
			<?php } ?>
			<?php if (!empty($rest_hours)) { ?>
				<p><?php echo $rest_hours; ?></p>
			<?php } ?>
			<?php if (!empty($rest_menu)) { ?>
				<p><a href="<?php echo $rest_menu; ?>" class="btn-link-alt" target="_blank">View Menu</a></p>
			<?php } ?>

		</div><!-- .site-branding -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
