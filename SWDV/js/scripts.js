

document.addEventListener('DOMContentLoaded', function() {
	var home = new Typed('#home_menu', {
		strings: ["Home", "You want 'Home'", "Here ya go", "Home"],
		typeSpeed: 100,
		backSpeed: 100,
		backDelay: 500,
		startDelay: 1000,
	  	showCurser: false
	});
	var home = new Typed('#jquery_menu_1', {
		strings: ["jQuery Fun", "This one is for fun",],
		typeSpeed: 100,
		backSpeed: 100,
		backDelay: 1000,
		startDelay: 12000,
	  	showCurser: false
	});

	var home = new Typed('#jquery_menu_2', {
		strings: ["More jQuery Fun", "Do NOT click this button!", "Why didn't you click the button?"],
		typeSpeed: 100,
		backSpeed: 100,
		backDelay: 1000,
		startDelay: 18000,
	  	showCurser: false
	});
	var typed = new Typed('#typeText', {
	  	strings: ["How about some typing live on the screen?",
				"How about some partial text being erased?",
				"Did you see how it didn't erase all the way back?"
				],
	  	typeSpeed: 30,
	  	backSpeed: 20,
	  	backDelay: 1000,
	  	startDelay: 12000,
	  	showCurser: false
	});
	var typed = new Typed('#listTyped', {
	  	stringsElement: '#typed-strings',
	  	typeSpeed: 30,
	  	backSpeed: 20,
	  	backDelay: 1000,
	  	startDelay: 30000,
	  	showCurser: false
	});
});