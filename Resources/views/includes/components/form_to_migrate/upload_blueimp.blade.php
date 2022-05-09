{{-- http://laraveldaily.com/laravel-ajax-file-upload-blueimp-jquery-library/
    http://laraveldaily.com/upload-multiple-files-laravel-5-4/ --}}
{{ Theme::add('/theme/bc/jquery/dist/jquery.min.js') }}
{{ Theme::add('/theme/bc/blueimp-file-upload/js/vendor/jquery.ui.widget.js') }}
{{ Theme::add('/theme/bc/blueimp-load-image/js/load-image.all.min.js') }}
{{ Theme::add('/theme/bc/blueimp-canvas-to-blob/js/canvas-to-blob.min.js') }}
{{ Theme::add('/theme/bc/blueimp-file-upload/js/jquery.iframe-transport.js') }}
{{ Theme::add('/theme/bc/blueimp-file-upload/js/jquery.fileupload.js') }}
{{ Theme::add('/theme/bc/blueimp-file-upload/js/jquery.fileupload-process.js') }}
{{ Theme::add('/theme/bc/blueimp-file-upload/js/jquery.fileupload-image.js') }}
{{ Theme::add('/theme/bc/blueimp-tmpl/js/tmpl.min.js') }}
{{ Theme::add('pub_theme::css/upload_image.css') }}
{{ Theme::add('pub_theme::js/upload_image.js') }}

<div id="dropzone" class="dropzone">
    <div class="fileupload_wrapper">
        Trascina il file qui o
        <label class="fileupload_label"><i class="fa fa-folder-open-o"></i>&nbsp;Sfoglia...
            <input id="fileupload" type="file" name="files" multiple="multiple">
        </label>
        <!--
        (multiple files can be selected)
          -->
    </div>
</div>

<div id="files" class="thumbnails clearfix"></div>

<div class="progress" id="progress">
    <div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"></div>
</div>
