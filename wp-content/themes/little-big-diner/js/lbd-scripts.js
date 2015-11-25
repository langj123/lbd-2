jQuery(document).ready(function($){

	var letters = $("#svg-letters .st1, .svg-char"),
	letterClass = letters.attr("class"),
	duration = 50,
	finished = false, // used to check animation of letters
	logo = $(".svg-oct"),
	dattr = logo.attr("data-attr");

	// animate opacity and postion of letters in svg logo
	var letterAnimate = (function(){
			var intv = setInterval(function(){

				if (finished === true) {
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

	// Interval to check completion of letter animation
	var octAnimate = (function(){

			logo.animate({
				opacity : 1,
				top: 0

			}, duration, function(){
				finished = true;
				logo.attr("data-attr", dattr + " svg-animate");

			});
			return finished;
	})();

});

