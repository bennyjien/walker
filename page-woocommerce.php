<?php
/* Template Name: WooCommerce */
?>

<?php get_header(); ?>

				<div class="woocommerce-content page-content">
					<div class="inner wrap clearfix">

						<div class="main fullscreen" role="main">

							<?php while (have_posts()) : the_post(); ?>

							<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

								<div class="page-header entry-header">
									<h1 class="page-title entry-title"><?php the_title(); ?></h1>
								</div>

								<div class="generated-content clearfix">
									<?php the_content(); ?>
								</div>

							</div>

							<?php endwhile; ?>

						</div>

					</div>
				</div>

<?php get_footer(); ?>
