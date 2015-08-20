/* Walker Style File
 * This file unlocks the limit of style.css
 */

// initialize when document is ready
jQuery(document).ready(function($) {

	// hover for touchscreen
	$('.hoverable').bind('touchstart', function() {
		$(this).toggleClass('hover');
	});

	// initialize responsive navigation
	var mainNav = $('#site-nav');
	var nav = responsiveNav('#site-nav', {
		animate: false,
		closeOnNavClick: true,
		customToggle: "#site-nav-toggle",
		openPos: 'absolute',
		open: function() {
			$('body').on('click', function(e) {
				if (!mainNav.is(e.target) && mainNav.has(e.target).length === 0) {
					nav.close();
				}
			});
		}
	});

});
