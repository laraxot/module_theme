{{ Theme::add('theme/bc/dropzone/dist/min/dropzone.min.css') }}
{{ Theme::add('theme/bc/dropzone/dist/dropzone.js') }}
<div class="dropzone" data-url="{{ route('unisharp.lfm.upload') }}">
    <div class="dz-default dz-message">
        <h3>{{ $name or  'Drop files here or click to upload.'}}</h3>
        <p class="text-muted">'Any related files you can upload'<br>
            <small>One file can be max {{ config('attachment.max_size', 0) / 1000 }} MB</small></p>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
   
    $(".dropzone").dropzone({
        url: "{{ route('unisharp.lfm.upload') }}",
        maxFilesize: {{ isset($maxFileSize) ? $maxFileSize : config('attachment.max_size', 1000) / 1000 }},
        acceptedFiles: "{!! isset($acceptedFiles) ? $acceptedFiles : config('attachment.allowed') !!}",
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"}
    });
    
});
</script>
@endpush
{{--
http://itsolutionstuff.com/post/how-to-display-existing-files-on-server-in-dropzone-js-using-phpexample.html
 --}}
