<?php
/* Template Name: Fullscreen (No Sidebar) */
?>

<?php get_header(); ?>

				<div class="fullscreen-content page-content">
					<div class="inner wrap clearfix">

						<div class="main main-fullscreen" role="main">

							<?php while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
								</header>

								<div class="entry-content clearfix">
									<?php the_content(); ?>
									<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . __( 'Pages:', 'walkertheme' ),
											'after'  => '</div>',
										) );
									?>
								</div>

							</article>

							<?php comments_template(); ?>

							<?php endwhile; ?>

						</div>

					</div>
				</div>

<?php get_footer(); ?>
