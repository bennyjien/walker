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

		<nav id="mobile-site-nav" class="mobile-site-nav" role="navigation">
			<div class="inner">
				<?php walker_site_nav(); ?>
			</div>
		</nav>

		<div id="site" class="site">

			<!--[if lte IE 8]>
				<p class="browse-happy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->

			<header class="site-header" role="banner">
				<div class="inner wrap clearfix">

					<a id="mobile-site-nav-toggle" class="mobile-site-nav-toggle site-nav-toggle" href="#">
						<div class="icon"></div>
					</a>

					<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>

					<nav id="site-nav" class="site-nav" role="navigation">
						<button id="site-nav-toggle" class="site-nav-toggle is-invisible"><div class="icon"></div></button>
						<?php walker_site_nav(); ?>
						<ul class='menu menu-secondary is-invisible'></ul>
					</nav>

				</div>
			</header>

			<div class="site-content">
