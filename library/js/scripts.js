/* Walker Scripts File
 * This file will also prepend style.js when minified by Codekit
 */

// Avoid `console` errors in browsers that lack a console.
(function() {
	var method;
	var noop = function () {};
	var methods = [
		'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
		'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
		'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
		'timeStamp', 'trace', 'warn'
	];
	var length = methods.length;
	var console = (window.console = window.console || {});

	while (length--) {
		method = methods[length];

		if (!console[method]) {
			console[method] = noop;
		}
	}
}());

// initialize when document is ready
jQuery(document).ready(function($) {

	// initialize FastClick (use .needsclick if click is required)
	FastClick.attach(document.body);

	// initialize Tabs
	$('.tabs').walkerTabs();

	// initialize magnificPopup
	$('.mfp-link').magnificPopup({
		type: 'inline',
		mainClass: 'mfp-animation',
		removalDelay: 200
	});

});
