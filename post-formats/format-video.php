							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/VideoObject">

								<header class="entry-header">
									<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
									<p class="entry-meta"><?php printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'walkertheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link(get_the_author_meta('ID')), get_the_category_list(', ')); ?></p>
								</header>

								<div class="entry-content clearfix" itemprop="description">
									<?php the_content(); ?>
									<?php
										wp_link_pages( array(
											'before' 		=> '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'walkertheme' ) . '</span>',
											'after' 		=> '</div>',
											'link_before' 	=> '<span>',
											'link_after' 	=> '</span>',
										) );
									?>
								</div>

								<footer class="entry-footer">
									<?php the_tags('<p class="entry-tags"><span class="tags-title">' . __('Tags:', 'walkertheme') . '</span> ', ', ', '</p>'); ?>
								</footer>

							</article>
