<?php get_header(); ?>

				<div class="search-page-content page-content">
					<div class="inner wrap clearfix">

						<div class="main" role="main">

							<header class="main-header">
								<h1 class="title"><span><?php _e('Search Results for:', 'walkertheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
							</header>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

								<header class="entry-header">
									<h1 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<p class="meta"><?php printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'walkertheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link(get_the_author_meta('ID')), get_the_category_list(', ')); ?></p>
								</header>

								<div class="entry-excerpt">
									<?php the_post_thumbnail('walker-thumb-300'); ?>
									<?php the_excerpt(); ?>
								</div>

							</article>

							<?php endwhile; ?>

							<?php if (function_exists('walker_pagination')) { walker_pagination(); } ?>

							<?php else : ?>

							<section class="entry entry-missing">

								<header class="entry-header">
									<h1 class="title"><?php _e("Oops, Post Not Found!", "walkertheme"); ?></h1>
								</header>

								<div class="entry-content">
									<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "walkertheme"); ?></p>
								</div>

								<footer class="entry-footer">
									<p><?php _e("This error message is generated by robot.", "walkertheme"); ?></p>
								</footer>

							</section>

							<?php endif; ?>

						</div>

						<?php get_sidebar(); ?>

					</div>
				</div>

<?php get_footer(); ?>
