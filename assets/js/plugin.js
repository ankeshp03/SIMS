$(function() {
	"use strict";
	var window_width = $(window).width();
	$(window).load(function() {
		setTimeout(function() {
			$('body').addClass('loaded');
		}, 200);
	});
});