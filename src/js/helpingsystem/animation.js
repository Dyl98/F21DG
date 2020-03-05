$(function() {
	$('*[id^=_help]').tooltip({ 
		track: true, 
		delay: 0, 
		showURL: false, 
		showBody: " - ", 
		fade: 100,
		bodyHandler: function() {
			return getHelpText($(this).attr("id"));
		},
	});
});
