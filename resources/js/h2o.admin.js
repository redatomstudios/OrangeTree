/* Javascript Document */
/* Created by redAtom Studios @ 2012 */

/**/// User customizable options
/**/   var slideSpeed = 300; 	// Speed of sliding animation in milliseconds, larger numbers mean slower speeds
/**/   var holdTime = 8000;		// Time to hold each slide in milliseconds
/**/   var currentSlide = 1;	// Slide to start at, make sure this is less than the total number of slides
/**/// End of user customization options


// System variables, no need to be modifiying these unless slider core needs to be altered.
var slideWidth = 0, slideCount = 0, sliderState;

var setupSlider = function() {
	//console.log('setup');
	var totalWidth = 0;
	var slideTrain = $('div#sliderPreview ul').children('li');
	if(slideTrain) {
		slideCount = slideTrain.length;
	
		if(slideCount <= 1) {
			return false;
		}
	
		slideWidth = $(slideTrain[0].children[0]).outerWidth(true);
		totalWidth = slideWidth*slideCount;
		
		if(totalWidth) {
			//console.log($('#sliderPreview li').width(), $('#sliderPreview ul').width());
			$('div#sliderPreview ul').width(totalWidth).css({left: -slideWidth*(currentSlide - 1) + 'px'});
			$('#sliderPreview li').width($('#sliderPreview').width() + 'px');
			//console.log($('#sliderPreview li').width(), $('#sliderPreview ul').width());
			gotoSlide(currentSlide);
		} else {
			setTimeout(setupSlider, 100);
		}
	}
}

var gotoSlide = function(slide) {
	if(sliderState) {
		clearTimeout(sliderState);
	}

	if(slide > slideCount) {
		slide %= slideCount;
	} else if(slide <= 0) {
		slide = slideCount;
	}

	$('div#sliderPreview ul').animate({left: -slideWidth*(slide - 1) + 'px'}, slideSpeed);
	$('div#sliderPreview ul li').queue('fx', []).animate({opacity: 0});
	$($('div#sliderPreview ul li')[slide - 1]).queue('fx', []).animate({opacity: 1});

	currentSlide = slide;
	sliderState = setTimeout("gotoSlide(++currentSlide)", holdTime + slideSpeed);
}

var autosizeSlider = function() {
	if($('#sliderPreview')){
		var $newHeight;
		if(!($newHeight = $('#sliderPreview li > img').height())) {
			setTimeout('autosizeSlider()', 100);
		} else {
			$('#sliderPreview').height(function(){
				return $newHeight + 'px';
			});
			$('img#slideControlRight, img#slideControlLeft').each(function(){
				$(this).css({top: ($newHeight / 2 - 15) + 'px'});
			})
			//console.log($('#sliderPreview li').width());
			setupSlider();
		}
	}
}

jQuery(document).ready(function($){

	autosizeSlider();

	$('#slideControlRight').click(function(){
		gotoSlide(++currentSlide);
	});
	$('#slideControlLeft').click(function(){
		gotoSlide(--currentSlide);
	});

	if(document.getElementById('file-uploader')) {
		var uploader = new qq.FileUploader({
			// pass the dom node (ex. $(selector)[0] for jQuery users)
			element: document.getElementById('file-uploader'),
			allowedExtensions: ['png'],
			debug: false,
			// path to server-side upload script
			action: siteBase + 'server/logoHandler.php'
		}); 
	}

	if(document.getElementById('slide-uploader')) {
		var uploader = new qq.FileUploader({
			// pass the dom node (ex. $(selector)[0] for jQuery users)
			element: document.getElementById('slide-uploader'),
			allowedExtensions: ['jpg', 'jpeg'],
			debug: false,
			// path to server-side upload script
			action: siteBase + 'server/slideHandler.php'
		}); 
	}

	$(window).resize(function(){
		autosizeSlider();
	});
});