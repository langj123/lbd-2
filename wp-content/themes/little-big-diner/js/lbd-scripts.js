jQuery(document).ready(function($){

	var letters = $("#svg-letters .st1, .svg-char"),
	letterClass = letters.attr("class"),
	win = $(window),
	duration = 50,
	finished = false, // used to check animation of letters
	logo = $(".svg-oct"),
	dattr = logo.attr("data-attr"),
	pad = 300,
	sectTop = $("#Lets-noodle-cont").offset().top + pad,
	logoOct = $("#Lets-noodle"),
	scrollBar = $(window).scrollTop(),
	menuBttn = $(".menu-sect a.btn-link-alt"),
	mBttnHeight = menuBttn.height(),
	firstSect = $("#main > .col-lg-12:first-of-type"),
	firstSectCol1 = firstSect.find(".col-alt"),
	firstSectCol2 = firstSect.find("> .info-sect"),
	textBlurb = $(".text-blurb"),
	wHeight = $(window).height();


	// fade body in, octie animates down
	var logoAnimate = (function(){

			logo.animate({
				opacity : 1,
				top: 0

			}, duration, function(){
				finished = true;
				logo.attr("data-attr", dattr + " svg-animate");

			});

			return finished;
	})();
	// animate opacity and postion of letters in svg logo
	var letterAnimate = (function(){
			var intv = setInterval(function(){

				if (finished === true) {

					// animate letter in logo
					var len = letters.length,
					i = 0;
					var iterate = function(){
						var letter = $(letters[i]);
						letter.animate({
							opacity : 1
						}, duration, function() {
							letter.attr("class", letterClass + " svg-animate");
						});
						if (i <= len) {
							i++;
						} else {
							finished = true;
							return finished;
						}
						setTimeout(iterate, duration);
					};

					iterate();
				clearInterval(intv);
				}

			}, duration);
	})();

	// scrolling function to determine whether animate at bottom

	var scrollFunc = $(window).on("scroll", function(){
		scrollBar = $(window).scrollTop();
		if (scrollBar + wHeight >= sectTop) {
			logoOct.attr("class", "init-animate");
			textBlurb.css({
				opacity : 1
			});
		} else if (scrollBar < sectTop) {
			logoOct.removeAttr("class");
		}

	});

	// gentle scroll to anchor links on page
	$('#Primary-menu a').click(function(){
    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
    return false;

	});

	// menu button centering, next to about section
	var resizing = (function() {

		heightDiff = (firstSectCol1.height() - firstSectCol2.height())/2;

		win.on({
			resize : function() {
				if (firstSectCol1.height() > firstSectCol2.height()) {

					heightDiff = (firstSectCol1.height() - firstSectCol2.height())/2;

					menuBttn.css({"transform" : "translateY(" + heightDiff + "px)"});

				}
			},
			scroll : function() {
				if (firstSectCol1.height() > firstSectCol2.height()) {

					heightDiff = (firstSectCol1.height() - firstSectCol2.height())/2;

					menuBttn.css({"transform" : "translateY(" + heightDiff + "px)"});

				}
			}
		});

	})();
});

