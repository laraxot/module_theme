@if (session('status') && !is_array(session('status')) )
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('status_error'))
    <div class="alert alert-danger">
        {{ session('status_error') }}
    </div>
@endif
@if (session('swal'))
{{ Theme::add('theme/bc/sweetalert2/dist/sweetalert2.all.min.js') }}
{{ Theme::add('theme/bc/sweetalert2/dist/sweetalert2.min.css') }}
@push('scripts')
<script>
$(document).ready(function(){	
	Swal({!! json_encode(session('swal')) !!});
});
</script>
@endpush
@endif
{{--
	https://github.com/laracasts/flash/blob/master/src/views/message.blade.php

 --}}