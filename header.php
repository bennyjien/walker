<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<link rel="author" href="humans.txt" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="container" class="container">

			<!--[if lte IE 8]>
				<p class="browse-happy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->

			<header class="site-header" role="banner">
				<div class="inner wrap clearfix">

					<a class="logo" href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a>

					<a href="#" id="nav-toggle" class="nav-toggle">
						<span class="icon">Menu</span>
					</a>

				</div>
			</header>

			<nav id="main-nav" class="main-nav" role="navigation">
				<div class="inner wrap clearfix">
					<?php walker_main_nav(); ?>
				</div>
			</nav>

			<div class="site-content scene">
