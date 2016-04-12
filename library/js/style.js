/* Walker Style File
 * This file unlocks the limit of style.css
 */

// initialize when document is ready
jQuery(document).ready(function($) {

	var $win = $(window);
	var $body = $('body');

	// toggle function (link will toggle href, think checkbox)
	// modifier: .toggle-soft, .toggle-once, .toggle-scroll
	// function: data-untoggle-duration
	var toggleFunction = function() {
		$('.toggle').on('click', function(e) {
			var $this = $(this);
			var $toggleID = $($this.attr('href'));
			var untoggleDuration = $this.data('untoggle-duration');
			var bodyClass = $this.attr('href').substring(1);

			if ($toggleID.hasClass('is-toggled')) {
				$this.removeClass('is-toggled');
				$toggleID.removeClass('is-toggled');
				if (untoggleDuration) {
					$body.addClass(bodyClass+'-is-untoggling');
					setTimeout(function() {
						$body.removeClass(bodyClass+'-is-toggled').removeClass(bodyClass+'-is-untoggling');
					}, untoggleDuration);
				} else {
					$body.removeClass(bodyClass+'-is-toggled');
				}
			} else {
				if ($this.hasClass('toggle-scroll')) {
					$toggleID.addClass('is-toggled').velocity('scroll');
				} else {
					$toggleID.addClass('is-toggled');
				}
				if ($this.hasClass('toggle-once')) {
					$this.remove();
				}
				$this.addClass('is-toggled');
				$body.addClass(bodyClass+'-is-toggled');
			}

			$body.on('click touchend', function(ev) {
				if ($this.hasClass('toggle-soft') && !$this.is(ev.target) && $this.has(ev.target).length === 0 && !$toggleID.is(ev.target) && $toggleID.has(ev.target).length === 0) {
					$this.removeClass('is-toggled');
					$toggleID.removeClass('is-toggled');
					if (untoggleDuration) {
						$body.addClass(bodyClass+'-is-untoggling');
						setTimeout(function() {
							$body.removeClass(bodyClass+'-is-toggled').removeClass(bodyClass+'-is-untoggling');
						}, untoggleDuration);
					} else {
						$body.removeClass(bodyClass+'-is-toggled');
					}
				}
			});
			e.preventDefault();
		});
	};

	// select function (link will select href and unselect others from same data-select, think tabs)
	// modifier: .select-scroll
	var selectFunction = function() {
		$('.select').on('click', function(e) {
			var $this = $(this);
			var $selectID = $($this.attr('href'));
			var $selectGroup = $('.'+$selectID.data('select'));

			if (!$selectID.hasClass('is-selected')) {
				$selectGroup.removeClass('is-selected');
				if ($this.hasClass('select-scroll')) {
					$selectID.addClass('is-selected').velocity('scroll');
				}
				else {
					$selectID.addClass('is-selected');
				}
			}
			e.preventDefault();
		});
	};

	// site-nav priority navigation
	var $siteNav = $('#site-nav');
	var $siteNavToggle = $('#site-nav-toggle');
	var $siteNavMenu = $siteNav.find('.menu-primary');
	var $siteNavMenuSecondary = $siteNav.find('.menu-secondary');
	var breaks = [];

	function updateNav() {
		var availableSpace = $siteNavToggle.hasClass('is-hidden') ? $siteNav.width() : $siteNav.width() - $siteNavToggle.width();

		if ($siteNavMenu.width() > availableSpace) {
			breaks.push($siteNavMenu.width());
			$siteNavMenu.css('padding-right', $siteNavToggle.width()).children().last().prependTo($siteNavMenuSecondary);
			$siteNav.addClass('is-collapsed');

			if ($siteNavToggle.hasClass('is-hidden')) {
				$siteNavToggle.removeClass('is-hidden');
			}
		} else {
			if (availableSpace > breaks[breaks.length-1]) {
				$siteNavMenuSecondary.children().first().appendTo($siteNavMenu);
				breaks.pop();
			}

			if (breaks.length < 1) {
				$siteNav.removeClass('is-collapsed');
				$siteNavToggle.addClass('is-hidden');
				$siteNavMenuSecondary.addClass('is-hidden');
				$siteNavMenu.css('padding-right', '0');
			}
		}

		$siteNavToggle.attr('count', breaks.length);

		if ($siteNavMenu.width() > availableSpace) {
			updateNav();
		}
	}

	$siteNavToggle.on('click', function() {
		$(this).toggleClass('is-active');
		$siteNavMenuSecondary.toggleClass('is-hidden');
	});

	// window listeners
	$win.resize(function() {
		updateNav();
	});

	// run functions
	toggleFunction();
	selectFunction();
	updateNav();

});
