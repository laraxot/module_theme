{{ Theme::add('theme/bc/Croppie/croopie.css') }}
{{ Theme::add('theme/bc/Croppie/croopie.min.js') }}
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