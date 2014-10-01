;var ARC = (function ($){ // private scope provided by immediate function
	"use strict";

	// declare private variables here

	// initialization
	function init () {
		$(function(){
			$('.main-menu-toggle').click(function(){
				$(this).toggleClass('active');
				$('.main-menu').toggleClass('active');
			});
		});
	}

	// declare private methods heres


	return { // only methods you declare public are revealed
		init: init
	};

}(jQuery));
ARC.init();