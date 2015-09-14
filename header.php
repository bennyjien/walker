<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="author" href="humans.txt" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="site" class="site">

			<!--[if lte IE 8]>
				<p class="browse-happy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->

			<header class="site-header" role="banner">
				<div class="inner wrap clearfix">

					<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>

					<a href="#" id="site-nav-toggle" class="site-nav-toggle">
						<span class="icon">Menu</span>
					</a>

				</div>
			</header>

			<nav id="site-nav" class="site-nav" role="navigation">
				<div class="inner wrap clearfix">
					<?php walker_site_nav(); ?>
				</div>
			</nav>

			<div class="site-content">
