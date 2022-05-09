{{ Theme::add('theme/bc/Croppie/croppie.css') }}
{{ Theme::add('theme/bc/Croppie/croppie.min.js') }}
{{ Theme::add('pub_theme::includes/components/form/js/croppie.js') }}

<div class="col-md-4 text-center">
	<div id="upload-demo"></div>
</div>
<div class="col-md-4" style="padding:5%;">
	<strong>Select image to crop:</strong>
	<input type="file" id="image">

	<button class="btn btn-primary btn-block upload-image" style="margin-top:2%">Upload Image</button>
</div>

<div class="col-md-4">
	<div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
</div>

{{--
http://www.expertphp.in/article/laravel-php-cropping-and-uploading-an-image-with-croppie-plugin-using-jquery-ajax
https://www.sitepoint.com/10-jquery-file-uploads/
http://plugins.krajee.com/file-basic-usage-demo 
https://fineuploader.com/demos.html
https://colorlib.com/wp/jquery-file-upload-scripts/ !!!
http://www.bestjquery.com/demo/jquery-file-upload/page/2/
 --}}