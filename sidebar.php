<div id="main-sidebar" class="main-sidebar" role="complementary">
	<div class="inner clearfix">

		<?php if (is_active_sidebar('main-sidebar')) : ?>

			<?php dynamic_sidebar('main-sidebar'); ?>

		<?php else : ?>

			<div class="alert">
				<p><?php _e("Please activate some Widgets or remove this.", "walkertheme");  ?></p>
			</div>

		<?php endif; ?>

	</div>
</div>
