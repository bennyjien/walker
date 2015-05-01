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
	var mainNav = $('#main-nav');
	var nav = responsiveNav('#main-nav', {
		animate: false,
		closeOnNavClick: true,
		customToggle: "#nav-toggle",
		openPos: 'absolute',
		open: function() {
			$('html').on('click', function(e) {
				if (!$(e.target).is(mainNav)) {
					nav.close();
				}
			});
		}
	});

	// initialize animsition
	$('.scene').animsition({
		inClass: 'scene-in',
		outClass: 'scene-out',
		inDuration: 400,
		outDuration: 400,
		linkElement: 'a:not([target="_blank"]):not([href*=#]):not([class~="zoom"]):not([class~="needsclick"])',
		loading: true,
		loadingParentElement: '.container',
		loadingClass: 'scene-loading',
		unSupportCss: [ "animation-duration", "-webkit-animation-duration", "-o-animation-duration" ],
		overlay: false, // set to "true" for overlay mode
		overlayClass: "scene-overlay",
		overlayParentElement: ".container"
	});

});
