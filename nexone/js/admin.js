/* 
	Enable FW options in widgets on add (without refresh)
	By simulating a save click after add and then initialize them with fw:options:init
 */
jQuery(function($) {
	let timeoutAddId;
	$(document).on('widget-added', function(ev, $widget){
		clearTimeout(timeoutAddId);
		timeoutAddId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
			$widget.find('form input[type="submit"]').click();
		}, 500);
	});

	let timeoutUpdateId;
	$(document).on('widget-updated', function(ev, $widget){
		clearTimeout(timeoutUpdateId);
		timeoutUpdateId = setTimeout(function(){ // wait a few milliseconds for html replace to finish
			fwEvents.trigger('fw:options:init', { $elements: $widget });
		}, 100);
	});
});