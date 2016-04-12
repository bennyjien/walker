							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="entry-header">
									<h1 class="title" itemprop="headline"><?php the_title(); ?></h1>
									<p class="meta"><?php printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>.', 'walkertheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link(get_the_author_meta('ID'))); ?></p>
								</header>

								<div class="entry-content clearfix" itemprop="articleBody">
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
									<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'walkertheme') . '</span> ', ', ', '</p>'); ?>
								</footer>

							</article>
