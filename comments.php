<?php if (post_password_required()) return; ?>

<div id="comments" class="comments">

	<?php if (have_comments()) : ?>
		<h3 class="comments-title">
			<?php printf(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'walkertheme'), number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>'); ?>
		</h3>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<nav id="comment-nav-above" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text"><?php _e('Comment navigation', 'walkertheme'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'walkertheme')); ?></div>
			<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'walkertheme')); ?></div>
		</nav>
		<?php endif; ?>

		<ol class="comment-list">
			<?php wp_list_comments(array('callback' => 'walker_comment', 'avatar_size' => '48')); ?>
		</ol>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<nav id="comment-nav-below" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text"><?php _e('Comment navigation', 'walkertheme'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'walkertheme')); ?></div>
			<div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'walkertheme')); ?></div>
		</nav>
		<?php endif; ?>

	<?php endif; ?>

	<?php if (! comments_open() && post_type_supports(get_post_type(), 'comments')) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'walkertheme' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>
