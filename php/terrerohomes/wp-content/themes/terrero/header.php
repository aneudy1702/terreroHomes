<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Terrero
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>

<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>Terrero Homes</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php get_sidebar('header'); ?>

<div id="home-page" class="site">
	<div id="main" class="wrapper">