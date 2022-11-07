@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

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
@php
//dddx(json_encode(session('swal')));
@endphp

<script>
$(document).ready(function(){
	Swal.fire({!! json_encode(session('swal')) !!});
});
</script>

@endif
{{--
	https://github.com/laracasts/flash/blob/master/src/views/message.blade.php

 --}}
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@push('scripts')
<script>
window.addEventListener('swal', event => {
    //alert('Name updated to: ' + event.detail.title);
    Swal.fire(event.detail);
});
</script>
@endpush
