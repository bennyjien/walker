<?php

require_once('library/walker.php');
require_once('library/admin.php');

/* SET CONTENT WIDTH */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

/* THUMBNAIL SIZE OPTIONS */
add_image_size('walker-thumb-300', 300, 300, true);

/* COMMENT LAYOUT */
function walker_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e('Pingback:', 'walker'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('Edit', 'walker'), '<span class="edit-link">', '</span>'); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
					<?php printf(__('%s <span class="says">says:</span>', 'walker'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?>
				</div>

				<div class="comment-metadata">
					<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
						<time datetime="<?php comment_time('c'); ?>">
							<?php printf(_x('%1$s at %2$s', '1: date, 2: time', 'walker'), get_comment_date(), get_comment_time()); ?>
						</time>
					</a>
					<?php edit_comment_link(__('Edit', 'walker'), '<span class="edit-link">', '</span>'); ?>
				</div>

				<?php if ('0' == $comment->comment_approved) : ?>
				<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'walker'); ?></p>
				<?php endif; ?>
			</footer>

			<div class="comment-content">
				<?php comment_text(); ?>
			</div>

			<?php
				comment_reply_link(array_merge($args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				)));
			?>
		</article>

	<?php
	endif;
}

/* SEARCH FORM LAYOUT */
function walker_wpsearch($form) {
	$form =
		'<form role="search" method="get" id="search-form" class="search-form" action="' . home_url('/') . '" >
			<label class="screen-reader-text" for="s">' . __('Search for:', 'walkertheme') . '</label>
			<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','walkertheme').'" />
			<input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
		</form>';
	return $form;
}

/* WOOCOMMERCE SUPPORT */
add_theme_support('woocommerce');

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action('woocommerce_before_main_content', 'walker_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'walker_wrapper_end', 10);
add_action('woocommerce_walker_sidebar', 'woocommerce_get_sidebar', 10);

function walker_wrapper_start() { ?>
	<div class="woocommerce-content page-content">
		<div class="inner wrap clearfix">
			<div class="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
<?php
}

function walker_wrapper_end() { ?>
			</div>
			<?php do_action('woocommerce_walker_sidebar'); ?>
		</div>
	</div>
<?php
}

function woocommerce_output_related_products() {
	woocommerce_related_products(4, 4);
}

?>
