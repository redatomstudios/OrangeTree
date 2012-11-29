/* Javascript Document */
/* Created by redAtom Studios @ 2012 */

jQuery(document).ready(function($){
	var uploader = new qq.FileUploader({
		// pass the dom node (ex. $(selector)[0] for jQuery users)
		element: document.getElementById('file-uploader'),
		allowedExtensions: ['png'],
		debug: false,
		// path to server-side upload script
		action: '/OrangeTree/server/logoHandler.php'
	}); 
});