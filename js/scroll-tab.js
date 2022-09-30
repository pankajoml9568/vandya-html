var $container = $(".js-tabs").parent();
var $tabsToggleGroup = $(".tabs__toggle-group");
var $tabs = $(".tabs__toggle");
var $activeTab = $(".tabs__toggle--active");
var $tabContents = $(".tabs__tab");

var $scrollLeft		= $(".js-action--scroll-left");
var $scrollRight	= $(".js-action--scroll-right");

var btnScrollLeft	= document.querySelector('.js-action--scroll-left');
var btnScrollRight	= document.querySelector('.js-action--scroll-right');
var tabsContainer	= document.querySelector('.tabs__toggle-group');
var tabs			= document.querySelectorAll('.tabs__toggle');
var selectedTabIndex	= 0;
var scrollIndex		= 0;
var scrollWidth		= tabs[0].clientWidth + 5;
var scrollLeft		= 0;

// var tabsContainer = document.querySelector('.tabs__toggle-group');
var tabsContainerWidth = tabsContainer.clientWidth;
var tabsScrollableWidth = tabsContainer.scrollWidth;

console.log("Container Width:", tabsContainerWidth, "Tabs Width:", tabsScrollableWidth);

if (tabsScrollableWidth > tabsContainerWidth) {
	// $tabsToggleGroup.prepend('<div class="tabs__left"></div>').append('<div class="tabs__right"></div>');
	// $tabsToggleGroup.before('<div class="tabs__left"></div>').after('<div class="tabs__right"></div>');
}

$tabContents
	.hide()
	.eq($tabs.index($activeTab))
	.show();

var btnAddTab = document.querySelector('.js-action--add-tab');
btnAddTab.addEventListener('click', function() {
	var tabName = prompt("What text would you like on the tab?");
	addTab(tabName);	
});

function addTab(tabName) {
	var tabToggleGroup = document.querySelector('.tabs__toggle-group');
	var tabsGroup = document.querySelector('.tabs__tabs-group');
	var newTabToggle = document.createElement('div');
	var newTab = document.createElement('div');
	
	newTabToggle.classList.add('tabs__toggle');
	newTabToggle.innerText = tabName;
	tabToggleGroup.appendChild(newTabToggle);
	
	newTab.classList.add('tabs__tab');
	newTab.innerText = tabName + " Content";
	newTab.style.display = 'none';
	tabsGroup.appendChild(newTab);
}

$tabs.on("click", function() {
	
	var $tabs = $(".tabs__toggle");
	var $activeTab = $(".tabs__toggle--active");
	var $tabContents = $(".tabs__tab");
	var $tab = $(this);
	var tabIndex = $tabs.index($tab);
	
	selectedTabIndex = tabIndex;
	console.log("Selected Tab:", selectedTabIndex);
	
	$tab.addClass("tabs__toggle--active");
	$activeTab.removeClass("tabs__toggle--active");
	
	$tabContents
		.hide()
		.eq(tabIndex)
		.show();
	
	// debugger;
	var tab			= $tab[0];
	var tabWidth	= tab.clientWidth;
	var tabLeft		= tab.offsetLeft;
	// var tabLeft		= tabsContainer.scrollLeft;
	var tabRight	= tabLeft + tabWidth;
	// var 
	
	if (tabLeft < tabsContainer.scrollLeft) {
		// animatedScrollTo(
		// 	tabsContainer,
		// 	tabLeft,
		// 	300,
		// 	true,
		// 	function() {
		// 		checkScrollButtonState();
		// 	}
		// );
		// tabsContainer.smoothScroll({to: tabLeft, callback: checkScrollButtonState});
		smoothScroll(tabsContainer, {to: tabLeft, callback: checkScrollButtonState});
	}

	
	// if (tabRight > (tabsContainerWidth - tabsContainer.scrollLeft)) {
	if (tabRight > (tabsContainer.scrollLeft + tabsContainerWidth)) {
		// animatedScrollTo(
		// 	tabsContainer,
		// 	(tabRight - tabsContainerWidth),
		// 	// tabLeft,
		// 	300,
		// 	true,
		// 	function() {
		// 		checkScrollButtonState();
		// 	}
		// );
		// tabsContainer.smoothScroll({to: (tabRight - tabsContainerWidth), callback: checkScrollButtonState});
		smoothScroll(tabsContainer, {to: (tabRight - tabsContainerWidth), callback: checkScrollButtonState});
	}
});

// $scrollRight.on("click", function() {
// 	var currentScrollLeft = $tabsToggleGroup[0].scrollLeft;
// 	$tabsToggleGroup.animate({left: currentScrollLeft - 100}, 250, "easeOutBounce");
// });

// document.addEventListener('DOMContentLoaded', function() {
	
	// var btnScrollLeft	= document.querySelector('.js-action--scroll-left');
	// var btnScrollRight	= document.querySelector('.js-action--scroll-right');
	// // var tabsContainer	= document.querySelector('.tabs__toggle-group');
	// var tabs			= document.querySelectorAll('.tabs__toggle');
	// var scrollIndex		= 0;
	// var scrollWidth		= tabs[0].clientWidth + 5;
	// var scrollLeft		= 0;
	
	if (tabsContainer.scrollLeft === 0) {
		btnScrollLeft.setAttribute("disabled", true);
	}
	
	// btnScrollLeft.onclick = function() {
	// 	tabsContainer.scrollLeft -= scrollWidth;
	// };
	
	
// button.addEventListener('click', function () {
//     animatedScrollTo(
//         document.body, // element to scroll with (most of times you want to scroll with whole <body>)
//         0, // target scrollY (0 means top of the page)
//         10000, // duration in ms,
// 		true,
//         function() { // callback function that runs after the animation (optional)
//           console.log('done!')
//         }
//     );
// });
	
	btnScrollLeft.addEventListener('click', function() {
		// scrollLeft -= scrollWidth;
		// scrollIndex = selectedTabIndex - 1;
		scrollIndex--;
		// console.log("Tab Index to scroll LEFT to", scrollIndex);
		scrollLeft -= tabs[scrollIndex].clientWidth + 7;
		// animatedScrollTo(
		// 	tabsContainer,
		// 	scrollLeft,
		// 	300,
		// 	true,
		// 	function() {
		// 		checkScrollButtonState();
		// 	}
		// );
		// tabsContainer.smoothScroll({to: scrollLeft, callback: checkScrollButtonState});
		smoothScroll(tabsContainer, {to: scrollLeft, callback: checkScrollButtonState});
	});
	
	btnScrollRight.addEventListener('click', function() {
		// scrollLeft += scrollWidth;
		// scrollIndex = selectedTabIndex + 1;
		// console.log("Tab Index to scroll RIGHT to", scrollIndex);
		scrollLeft += tabs[scrollIndex].clientWidth + 7;
		scrollIndex++;
		// animatedScrollTo(
		// 	tabsContainer,
		// 	scrollLeft,
		// 	300,
		// 	true,
		// 	function() {
		// 		checkScrollButtonState();
		// 	}
		// );
		
		// tabsContainer.smoothScroll({to: scrollLeft, callback: checkScrollButtonState});
		smoothScroll(tabsContainer, {to: scrollLeft, callback: checkScrollButtonState});
		
	});
	
	function checkScrollButtonState() {
		// console.log("scrollLeft:", tabsContainer.scrollLeft, "clientWidth:", tabsContainer.clientWidth, "scrollWidth:", tabsContainer.scrollWidth);
		
		if (tabsContainer.scrollLeft <= 0) {
			btnScrollLeft.setAttribute("disabled", true);
		} else {
			btnScrollLeft.removeAttribute("disabled");
		}
		
		if (tabsContainer.scrollLeft + tabsContainer.clientWidth >= tabsContainer.scrollWidth) {
			btnScrollRight.setAttribute("disabled", true);
		} else {
			btnScrollRight.removeAttribute("disabled");
		}
	}
	
	// btnScrollRight.onclick = function() {
	// 	tabsContainer.scrollLeft += scrollWidth;
	// 	// var currentScrollLeft = tabs.scrollLeft;
	// 	// tabs.animate([
	// 	// 	// keyframes
	// 	// 	{ transform: 'translateX(0px)' },
	// 	// 	{ transform: 'translateX(-50px)' }
	// 	// ], { 
	// 	// 	// timing options
	// 	// 	duration: 300,
	// 	// 	iterations: 1
	// 	// });
	// 	// scroll(tabs);
	// };
	
	
// var start = null;

// function scroll(element, timestamp) {
// 	// debugger;
//   if (!start) start = timestamp;
//   var progress = timestamp - start;
//   tabs.scrollLeft = Math.min(progress / 10, 200);
//   if (progress < 2000) {
//     window.requestAnimationFrame(scroll);
//   }
// }

// window.requestAnimationFrame(scroll);
	
// }, false);



// @see https://github.com/madebysource/animated-scrollto/blob/master/animatedScrollTo.js
// (function(window) {
//     var requestAnimFrame = (function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(callback){window.setTimeout(callback,1000/60);};})();

//     var easeInOutQuad = function (t, b, c, d) {
//         t /= d/2;
//         if (t < 1) return c/2*t*t + b;
//         t--;
//         return -c/2 * (t*(t-2) - 1) + b;
//     };

//     var animatedScrollTo = function(element, to, duration, scrollLeft, callback) {
        
//         var direction = 'scrollTop'
//         if (scrollLeft) direction = 'scrollLeft'
        
//         var start = element[direction],
//         change = to - start,
//         animationStart = +new Date();
//         var animating = true;
//         var lastpos = null;

//         var animateScroll = function() {
//             if (!animating) {
//                 if (callback) { callback(); }
//                 return;
//             }
//             requestAnimFrame(animateScroll);
//             var now = +new Date();
//             var val = Math.floor(easeInOutQuad(now - animationStart, start, change, duration));
//             if (lastpos) {
//                 if (lastpos === element[direction]) {
//                     lastpos = val;
//                     element[direction] = val;
//                 } else {
//                     animating = false;
//                 }
//             } else {
//                 lastpos = val;
//                 element[direction] = val;
//             }
//             if (now > animationStart + duration) {
//                 element[direction] = to;
//                 animating = false;
//             }
//         };
//         requestAnimFrame(animateScroll);
//     };

//     if (typeof module !== 'undefined' && typeof module.exports !== 'undefined') {
//         module.exports = animatedScrollTo;
//     } else {
//         window.animatedScrollTo = animatedScrollTo;
//     }
// })(window);

// Element.prototype.smoothScroll = function(options) {
	
// 	var requestAnimFrame = (function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(callback){window.setTimeout(callback,1000/60);};})();

//     // var easeInOutQuad = function(t, b, c, d) {
//     //     t /= d/2;
//     //     if (t < 1) return c/2*t*t + b;
//     //     t--;
//     //     return -c/2 * (t*(t-2) - 1) + b;
//     // };
	
// 	var defaults = {
// 		to			: 0,
// 		duration	: 250,
// 		axis		: "horizontal",
// 		easing		: "easeInOutQuad"
// 	};
	
// 	var settings = Object.assign({}, defaults, options);
	
// 	var direction = settings.axis === "horizontal" ? "scrollLeft" : "scrollTop";

// 	var element = this;
// 	var start = element[direction],
// 		change = settings.to - start,
// 		animationStart = +new Date();
// 	var animating = true;
// 	var lastpos = null;

// 	var animateScroll = function() {
// 		if (!animating) {
// 			if (settings.callback) {
// 				settings.callback();
// 			}
// 			return;
// 		}
// 		requestAnimFrame(animateScroll);
// 		var now = +new Date();
// 		// var val = Math.floor(easeInOutQuad(now - animationStart, start, change, settings.duration));
// 		// var val = Math.floor(Easing.linear(now - animationStart, start, change, settings.duration));
// 		var val = Math.floor(Easing[settings.easing](now - animationStart, start, change, settings.duration));
// 		if (lastpos) {
// 			if (lastpos === element[direction]) {
// 				lastpos = val;
// 				element[direction] = val;
// 			} else {
// 				animating = false;
// 			}
// 		} else {
// 			lastpos = val;
// 			element[direction] = val;
// 		}
// 		if (now > animationStart + settings.duration) {
// 			element[direction] = settings.to;
// 			animating = false;
// 		}
// 	};
// 	requestAnimFrame(animateScroll);

// };

function smoothScroll(element, options) {
	
	var requestAnimFrame = (function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(callback){window.setTimeout(callback,1000/60);};})();

	var defaults = {
		to			: 0,
		duration	: 250,
		axis		: "horizontal",
		easing		: "easeInOutQuad"
	};
	
	var settings = Object.assign({}, defaults, options);
	
	var direction = settings.axis === "horizontal" ? "scrollLeft" : "scrollTop";

	var start = element[direction],
		change = settings.to - start,
		animationStart = +new Date();
	var animating = true;
	var lastpos = null;

	var animateScroll = function() {
		if (!animating) {
			if (settings.callback) {
				settings.callback();
			}
			return;
		}
		requestAnimFrame(animateScroll);
		var now = +new Date();
		var val = Math.floor(Easing[settings.easing](now - animationStart, start, change, settings.duration));
		if (lastpos) {
			if (lastpos === element[direction]) {
				lastpos = val;
				element[direction] = val;
			} else {
				animating = false;
			}
		} else {
			lastpos = val;
			element[direction] = val;
		}
		if (now > animationStart + settings.duration) {
			element[direction] = settings.to;
			animating = false;
		}
	};
	requestAnimFrame(animateScroll);

};

/**
 * Easing Functions - inspired from http://gizma.com/easing/
 */
Easing = {
	
	// no easing, no acceleration
	linear: function(t, b, c, d) {
		return c*t/d + b;
	},
	
	// accelerating from zero velocity
	easeInQuad: function(t, b, c, d) {
		t /= d;
		return c*t*t + b;
	},

	// decelerating to zero velocity
	easeOutQuad: function(t, b, c, d) {
		t /= d;
		return -c * t*(t-2) + b;
	},

	// acceleration until halfway, then deceleration
	easeInOutQuad: function(t, b, c, d) {
		t /= d/2;
		if (t < 1) return c/2*t*t + b;
		t--;
		return -c/2 * (t*(t-2) - 1) + b;
	},
	
	// accelerating from zero velocity 
	easeInCubic: function(t, b, c, d) {
		t /= d;
		return c*t*t*t + b;
	},

	// decelerating to zero velocity 
	easeOutCubic: function(t, b, c, d) {
		t /= d;
		t--;
		return c*(t*t*t + 1) + b;
	},

	// acceleration until halfway, then deceleration 
	easeInOutCubic: function(t, b, c, d) {
		t /= d/2;
		if (t < 1) return c/2*t*t*t + b;
		t -= 2;
		return c/2*(t*t*t + 2) + b;
	},

	// accelerating from zero velocity 
	easeInQuart: function(t, b, c, d) {
		t /= d;
		return c*t*t*t*t + b;
	},

	// decelerating to zero velocity 
	easeOutQuart: function(t, b, c, d) {
		t /= d;
		t--;
		return -c * (t*t*t*t - 1) + b;
	},

	// acceleration until halfway, then deceleration
	easeInOutQuart: function(t, b, c, d) {
		t /= d/2;
		if (t < 1) return c/2*t*t*t*t + b;
		t -= 2;
		return -c/2 * (t*t*t*t - 2) + b;
	},

	// accelerating from zero velocity
	easeInQuint: function(t, b, c, d) {
		t /= d;
		return c*t*t*t*t*t + b;
	},

	// decelerating to zero velocity
	easeOutQuint: function(t, b, c, d) {
		t /= d;
		t--;
		return c*(t*t*t*t*t + 1) + b;
	},

	// acceleration until halfway, then deceleration 
	easeInOutQuint: function(t, b, c, d) {
		t /= d/2;
		if (t < 1) return c/2*t*t*t*t*t + b;
		t -= 2;
		return c/2*(t*t*t*t*t + 2) + b;
	}
	
};