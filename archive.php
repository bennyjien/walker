<?php get_header(); ?>

				<div class="archive-content page-content">
					<div class="inner wrap clearfix">

						<div class="main" role="main">

							<div class="archive-header entry-header">
								<h1 class="archive-title entry-title">
									<?php
										if (is_category()) :
											printf(__('Category Archives: %s', 'walkertheme'), '<span>' . single_cat_title('', false) . '</span>');

										elseif (is_tag()) :
											printf(__('Tag Archives: %s', 'walkertheme'), '<span>' . single_tag_title('', false) . '</span>');

										elseif (is_author()) :
											the_post();
											printf(__('Author Archives: %s', 'walkertheme'), '<span class="vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr(get_the_author()) . '" rel="me">' . get_the_author() . '</a></span>');
											rewind_posts();

										elseif (is_day()) :
											printf(__('Daily Archives: %s', 'walkertheme'), '<span>' . get_the_date() . '</span>');

										elseif (is_month()) :
											printf(__('Monthly Archives: %s', 'walkertheme'), '<span>' . get_the_date('F Y') . '</span>');

										elseif (is_year()) :
											printf(__('Yearly Archives: %s', 'walkertheme'), '<span>' . get_the_date('Y') . '</span>');

										elseif (is_tax('post_format', 'post-format-aside')) :
											_e('Asides', 'walkertheme');

										elseif (is_tax('post_format', 'post-format-image')) :
											_e('Images', 'walkertheme');

										elseif (is_tax('post_format', 'post-format-video')) :
											_e('Videos', 'walkertheme');

										elseif (is_tax('post_format', 'post-format-quote')) :
											_e('Quotes', 'walkertheme');

										elseif (is_tax('post_format', 'post-format-link')) :
											_e('Links', 'walkertheme');

										else :
											_e('Archives', 'walkertheme');

										endif;
									?>
								</h1>

								<?php
									if (is_category()) :
										$category_description = category_description();
										if (! empty($category_description)) :
											echo apply_filters('category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>');
										endif;

									elseif (is_tag()) :
										$tag_description = tag_description();
										if (! empty($tag_description)) :
											echo apply_filters('tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>');
										endif;

									endif;
								?>
							</div>

							<div class="articles">

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

									<header class="single-header entry-header">
										<h2 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<p class="entry-meta"><?php printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'walkertheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link(get_the_author_meta('ID')), get_the_category_list(', ')); ?></p>
									</header>

									<section class="entry-excerpt clearfix">
										<?php the_post_thumbnail('walker-thumb-300'); ?>
										<?php the_excerpt(); ?>
									</section>

								</article>

								<?php endwhile; ?>

							</div>

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
									<h2 class="missing-title entry-title"><?php _e("Oops, Post Not Found!", "walkertheme"); ?></h2>
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
