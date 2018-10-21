<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package plum
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="max-width-5 mx-auto py2" >	
	<div class="flex items-center">		
		<div>
			<a href="<?php echo home_url(); ?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/images/logo-320.jpg" alt="logo" width="40" height="auto"></a>
		</div>	
		<div class="flex-auto">
			<a href="<?php echo home_url(); ?>" class="text-decoration-none">
				<div class="h5 px2 mbold colorgreen" >Pusat Informasi Perbenihan</div>
				<div class=" px2" style="font-size: 11px; line-height: 1.1;" >Tanaman Pangan dan Holtikultura Provinsi Jawa Timur</div>
			</a>
		</div>
		<div class="flex-auto menu">
			<?php wp_nav_menu(['menu'=>'top']); ?>
		</div>
	</div>
</header>
<div class="headsepa"></div>