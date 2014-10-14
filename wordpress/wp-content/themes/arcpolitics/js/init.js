;var ARC = (function ($){ // private scope provided by immediate function
	"use strict";

	// declare private variables here

	// initialization
	function init () {
		$(function(){
			buttonHandlers();
			antiScroll();
		});
	}
	function antiScroll() {
		$('.nicescroll').niceScroll();
	}
	function buttonHandlers () {
		$('.main-menu-toggle').click(function(){
			toggleMainMenu();
		});
		$('.sub-menu-toggle, #content').click(function(){
			toggleSubMenu();
		});
		$('#content').click(function(){
			if( $('.sub-menu').hasClass('active') ) {
				toggleSubMenu();
			}
		});
	}
	function toggleMainMenu () {
		$('.main-menu-toggle').toggleClass('active');
		$('.main-menu').toggleClass('active');
	}
	function toggleSubMenu () {
		$('.sub-menu-toggle').toggleClass('active');
		$('.sub-menu').toggleClass('active');
	}

	// declare private methods heres


	return { // only methods you declare public are revealed
		init: init,
		toggleMainMenu: toggleMainMenu,
		toggleSubMenu: toggleSubMenu
	};

}(jQuery));
ARC.init();