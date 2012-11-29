/* Javascript Document */
/* Created by redAtom Studios @ 2012 */

var autosizeSlider = function autosizeSlider() {
	var $newHeight;
	if(!($newHeight = $('#sliderPreview li > img').height())) {
		setTimeout('autosizeSlider', 100);
	} else {
		$('#sliderPreview').height(function(){
			return $newHeight + 'px';
		});
		$('img#slideControlRight, img#slideControlLeft').each(function(){
			$(this).css({top: ($newHeight / 2 - 15) + 'px'});
		})
		console.log($('#sliderPreview li > img').height());
	}
}

jQuery(document).ready(function($){

	autosizeSlider();

	if(document.getElementById('file-uploader')) {
		var uploader = new qq.FileUploader({
			// pass the dom node (ex. $(selector)[0] for jQuery users)
			element: document.getElementById('file-uploader'),
			allowedExtensions: ['png'],
			debug: false,
			// path to server-side upload script
			action: '../../server/logoHandler.php'
		}); 
	}

	$(window).resize(function(){
		autosizeSlider();
	});
});