@php
Theme::add('theme/bc/croppic/assets/css/croppic.css');
Theme::add('theme/bc/croppic/assets/js/jquery.mousewheel.min.js');
Theme::add('theme/bc/croppic/croppic.min.js');
//Theme::add('theme/bc/croppic/assets/js/main.js');
@endphp

<div class="col-lg-4 ">
				<h4 class="centered"> MODAL </h4>
				<p class="centered">( open in modal window )</p>
				<div id="cropContainerModal"  style="width:100%; padding:5px 4%; margin:20px auto; display:block; border: 1px solid #CCC;" ></div>
			</div>

@push('scripts')
<script type="text/javascript">
	var croppicContainerModalOptions = {
				uploadUrl:'img_save_to_file.php',
				cropUrl:'img_crop_to_file.php',
				modal:true,
				imgEyecandyOpacity:0.4,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ console.log('onBeforeImgUpload') },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') },
				onReset:function(){ console.log('onReset') },
				onError:function(errormessage){ console.log('onError:'+errormessage) }
		}
		var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);
</script>
@endpush