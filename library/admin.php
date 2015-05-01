<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the dashboard.
*/


/* CUSTOM LOGIN PAGE */

// http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function walker_login_css() {
	wp_enqueue_style('walker_login_css', get_template_directory_uri() . '/login.css', false);
}

// changing the logo link from wordpress.org to your site
function walker_login_url() { return home_url(); }

// changing the alt text on the logo to show your site name
function walker_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action('login_enqueue_scripts', 'walker_login_css', 10);
add_filter('login_headerurl', 'walker_login_url');
add_filter('login_headertitle', 'walker_login_title');


/* CUSTOMIZE ADMIN */

// custom backend footer
function walker_admin_footer() {
	_e('<span id="footer-thankyou">Handcrafted by <a href="http://bennyjien.com" target="_blank">Benny Jien</a></span>.', 'walkertheme');
}

// adding it to the admin area
add_filter('admin_footer_text', 'walker_admin_footer');

?>
