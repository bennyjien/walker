<?php get_header(); ?>

				<div class="page-content missing-page-content">
					<div class="inner wrap clearfix">

						<div class="main main-fullscreen" role="main">

							<section class="page-not-found">

								<header class="entry-header">
									<h1 class="entry-title"><?php _e("Epic 404 - Page Not Found", "walkertheme"); ?></h1>
								</header>

								<div class="entry-content">
									<p><?php _e("The page you were looking for was not found, but maybe try looking again!", "walkertheme"); ?></p>
									<?php get_search_form(); ?>
								</div>

								<footer class="entry-footer">
									<p><?php _e("This error message is generated by robot.", "walkertheme"); ?></p>
								</footer>

							</section>

						</div>

					</div>
				</div>

<?php get_footer(); ?>
