<?php get_header(); ?>

				<div class="home-content page-content">
					<div class="inner wrap clearfix">

						<div class="main" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">

								<header class="single-header entry-header">
									<h2 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
									<p class="entry-meta"><?php printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'walkertheme'), get_the_time('Y-m-d'), get_the_time(get_option('date_format')), walker_get_the_author_posts_link(), get_the_category_list(', ')); ?></p>
								</header>

								<section class="entry-content clearfix">
									<?php the_content(); ?>
								</section>

								<footer class="entry-footer">
									<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'walkertheme') . '</span> ', ', ', ''); ?></p>
								</footer>

							</article>

							<?php endwhile; ?>

							<?php if (function_exists('walker_pagination')) { ?>

								<?php walker_pagination(); ?>

							<?php } else { ?>

								<nav class="prev-next">
									<ul class="clearfix">
										<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "walkertheme")) ?></li>
										<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "walkertheme")) ?></li>
									</ul>
								</nav>

							<?php } ?>

							<?php else : ?>

							<div class="missing-page page">

								<div class="missing-header entry-header">
									<h1 class="missing-title entry-title"><?php _e("Oops, Post Not Found!", "walkertheme"); ?></h1>
								</div>

								<div class="entry-content">
									<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "walkertheme"); ?></p>
								</div>

								<div class="entry-footer">
									<p><?php _e("This is the error message in the page-custom.php template.", "walkertheme"); ?></p>
								</div>

							</div>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

					</div>
				</div>

<?php get_footer(); ?>
