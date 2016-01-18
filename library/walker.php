<?php

/* LAUNCH WALKER */
add_action('after_setup_theme', 'walker_walk');

function walker_walk() {

	// launching operation cleanup
	add_action('init', 'walker_head_cleanup');
	// remove WP version from RSS
	add_filter('the_generator', 'walker_rss_version');
	// remove pesky injected css for recent comments widget
	add_filter('wp_head', 'walker_remove_wp_widget_recent_comments_style', 1);
	// clean up comment styles in the head
	add_action('wp_head', 'walker_remove_recent_comments_style', 1);
	// clean up gallery output in wp
	add_filter('gallery_style', 'walker_gallery_style');

	// enqueue base scripts and styles
	add_action('wp_enqueue_scripts', 'walker_scripts_and_styles', 999);

	// launching this stuff after theme setup
	add_action('init','walker_theme_support');
	// adding sidebars to Wordpress (these are created in functions.php)
	add_action('widgets_init', 'walker_register_sidebars');
	// adding the walker search form (created in functions.php)
	add_filter('get_search_form', 'walker_wpsearch');

	// cleaning up random code around images
	add_filter('the_content', 'walker_filter_ptags_on_images');
	// cleaning up excerpt
	add_filter('excerpt_more', 'walker_excerpt_more');

}

/* CLEAN WP_HEAD */
function walker_head_cleanup() {

	// EditURI link
	remove_action('wp_head', 'rsd_link');
	// windows live writer
	remove_action('wp_head', 'wlwmanifest_link');
	// index link
	remove_action('wp_head', 'index_rel_link');
	// previous link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	// start link
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	// links for adjacent posts
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	// WP version
	remove_action('wp_head', 'wp_generator');
	// remove WP version from css
	add_filter('style_loader_src', 'walker_remove_wp_ver_css_js', 9999);
	// remove Wp version from scripts
	add_filter('script_loader_src', 'walker_remove_wp_ver_css_js', 9999);

}

// remove WP version from RSS
function walker_rss_version() { return ''; }

// remove WP version from scripts
function walker_remove_wp_ver_css_js($src) {
	if (strpos($src, 'ver='))
		$src = remove_query_arg('ver', $src);
	return $src;
}

// remove injected CSS for recent comments widget
function walker_remove_wp_widget_recent_comments_style() {
	if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
		remove_filter('wp_head', 'wp_widget_recent_comments_style');
	}
}

// remove injected CSS from recent comments widget
function walker_remove_recent_comments_style() {
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
		remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
}

// remove injected CSS from gallery
function walker_gallery_style($css) {
	return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

/* SCRIPTS & ENQUEUEING */
// loading modernizr and jquery, and reply script
function walker_scripts_and_styles() {
	if (!is_admin()) {

		// modernizr
		wp_register_script('walker-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.min.js', array(), '2.6.2', false);

		// register main stylesheet
		wp_register_style('walker-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), '', 'all');

		// comment reply script for threaded comments
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script('comment-reply');
		}

		//adding scripts file in the footer
		wp_register_script('walker-library', get_stylesheet_directory_uri() . '/library/js/libs/library.min.js', array('jquery'), '', true);
		wp_register_script('walker-stylejs', get_stylesheet_directory_uri() . '/library/js/style.js', array('jquery'), '', true);
		wp_register_script('walker-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array('jquery'), '', true);

		// enqueue styles and scripts
		wp_enqueue_style('walker-stylesheet');
		wp_enqueue_script('walker-modernizr');
		wp_enqueue_script('walker-library');
		wp_enqueue_script('walker-stylejs');
		wp_enqueue_script('walker-js');

	}
}


/* THEME SUPPORT */
function walker_theme_support() {

	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

	add_theme_support('custom-background', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	));

	register_nav_menus(
		array(
			'site-nav' => __('Site Navigation', 'walkertheme')
		)
	);
}

/* NAVIGATION */
function walker_site_nav() {
	wp_nav_menu(array(
		'theme_location' 	=> 'site-nav',
		'container'			=> 'ul',
		'menu_class' 		=> 'menu menu-primary',
		'menu_id' 			=> 'menu-primary'
	));
}

/* SIDEBARS */
function walker_register_sidebars() {

	register_sidebar(array(
		'name' => __('Sidebar', 'walkertheme'),
		'id' => 'sidebar',
		'description' => __('The first (primary) sidebar.', 'walkertheme'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	));

}

/* PAGINATION */
function walker_pagination($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ($numposts <= $posts_per_page) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav><ul class="pagination">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __("First", 'walkertheme');
		echo '<li class="first-link"><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li class="prev-link">';
	previous_posts_link('Prev');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li><span class="current">'.$i.'<span class="sr-only">(current)</span></span></li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li class="next-link">';
	next_posts_link('Next');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __("Last", 'walkertheme');
		echo '<li class="last-link"><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ul></nav>'.$after."";
}

/* RANDOM CLEANUP ITEMS */
// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function walker_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function walker_excerpt_more($more) {
	global $post;
	return '... <a class="read-link" href="'. get_permalink($post->ID) . '" title="Read '. get_the_title($post->ID) .'">Read more...</a>';
}

?>
