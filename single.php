<?php get_header(); ?>

				<div class="single-page-content page-content">
					<div class="inner wrap clearfix">

						<div class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php while (have_posts()) : the_post(); ?>

							<?php get_template_part( 'post-formats/format', get_post_format() ); ?>

							<?php comments_template(); ?>

							<?php endwhile; ?>

						</div>

						<?php get_sidebar(); ?>

					</div>
				</div>

<?php get_footer(); ?>
