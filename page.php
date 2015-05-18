<?php get_header(); ?>

				<div class="page-content">
					<div class="inner wrap clearfix">

						<div class="main" role="main">

							<?php while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
									<p class="entry-meta"><?php printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'walkertheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link(get_the_author_meta('ID'))); ?></p>
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

						<?php get_sidebar(); ?>

					</div>
				</div>

<?php get_footer(); ?>
