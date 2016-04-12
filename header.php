<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<title><?php wp_title( '|', true, 'right' ); ?></title>

		<link rel="author" href="humans.txt" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div id="site" class="site">

			<header class="site-header" role="banner">
				<div class="inner wrap clearfix">

					<a class="mobile-nav-toggle site-nav-toggle toggle toggle-soft" data-untoggle-duration="200" href="#mobile-nav" aria-label="menu" aria-controls="nagivation">
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

			<nav id="mobile-nav" class="mobile-nav" role="navigation">
				<div class="inner">
					<?php walker_site_nav(); ?>
				</div>
			</nav>

			<div class="site-content">
