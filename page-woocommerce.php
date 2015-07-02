<?php
/* Template Name: WooCommerce */
?>

<?php get_header(); ?>

				<div class="page-content woocommerce-page-content">
					<div class="inner wrap clearfix">

						<div class="main main-fullscreen" role="main">

							<?php while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
								</header>

								<div class="entry-content clearfix">
									<?php the_content(); ?>
								</div>

							</article>

							<?php endwhile; ?>

						</div>

					</div>
				</div>

<?php get_footer(); ?>
