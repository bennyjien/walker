/* Walker Style File
 * This file unlocks the limit of style.css
 */

// initialize when document is ready
jQuery(document).ready(function($) {

	var $win = $(window);
	var $body = $('body');

	// hover for touchscreen
	$('.hoverable').bind('touchstart', function() {
		$(this).toggleClass('hover');
	});

	// site-nav priority navigation
	var $siteNav = $('#site-nav');
	var $siteNavToggle = $('#site-nav-toggle');
	var $siteNavMenu = $siteNav.find('.menu-primary');
	var $siteNavMenuSecondary = $siteNav.find('.menu-secondary');
	var breaks = [];

	function updateNav() {
		var availableSpace = $siteNavToggle.hasClass('is-invisible') ? $siteNav.width() : $siteNav.width() - $siteNavToggle.width();

		if($siteNavMenu.width() > availableSpace) {

			breaks.push($siteNavMenu.width());
			$siteNavMenu.css('padding-right', $siteNavToggle.width()).children().last().prependTo($siteNavMenuSecondary);
			$siteNav.addClass('is-collapsed');

			if($siteNavToggle.hasClass('is-invisible')) {
				$siteNavToggle.removeClass('is-invisible');
			}

		} else {

			if(availableSpace > breaks[breaks.length-1]) {
				$siteNavMenuSecondary.children().first().appendTo($siteNavMenu);
				breaks.pop();
			}

			if(breaks.length < 1) {
				$siteNav.removeClass('is-collapsed');
				$siteNavToggle.addClass('is-invisible');
				$siteNavMenuSecondary.addClass('is-invisible');
				$siteNavMenu.css('padding-right', '0');
			}
		}

		$siteNavToggle.attr('count', breaks.length);

		if($siteNavMenu.width() > availableSpace) {
			updateNav();
		}
	}

	$siteNavToggle.on('click', function() {
		$(this).toggleClass('is-active');
		$siteNavMenuSecondary.toggleClass('is-invisible');
	});

	// mobile-site-nav toggling
	var $mobileSiteNav = $('#mobile-site-nav');
	var $mobileSiteNavToggle = $('#mobile-site-nav-toggle');

	$mobileSiteNavToggle.on('click', function(e) {
		$(this).addClass('is-active');
		$mobileSiteNav.addClass('is-active');
		$body.addClass('mobile-site-nav-active');
		e.preventDefault();
	});

	$body.on('click touchstart', function(e) {
		if(!$mobileSiteNav.is(e.target) && !$mobileSiteNavToggle.is(e.target) && $mobileSiteNav.has(e.target).length === 0 && $mobileSiteNavToggle.has(e.target).length === 0) {
			$mobileSiteNavToggle.removeClass('is-active');
			$mobileSiteNav.removeClass('is-active');
			$body.removeClass('mobile-site-nav-active');
		}
	});

	// window listeners
	$win.resize(function() {
		updateNav();
	});

	// run functions
	updateNav();

});
