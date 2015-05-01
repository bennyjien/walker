<?php get_header(); ?>

				<div class="missing-content page-content">
					<div class="inner wrap clearfix">

						<div class="main fullscreen" role="main">

							<div class="missing-header entry-header">
								<h1 class="missing-title entry-title"><?php _e("Epic 404 - Page Not Found", "walkertheme"); ?></h1>
							</div>

							<div class="generated-content">
								<p><?php _e("The page you were looking for was not found, but maybe try looking again!", "walkertheme"); ?></p>
								<?php get_search_form(); ?>
							</div>

							<div class="entry-footer">
								<p><?php _e("This is the 404.php template.", "walkertheme"); ?></p>
							</div>

						</div>

					</div>
				</div>

<?php get_footer(); ?>
