@php
    dddx(session());
@endphp
@if (Session::has('status') && !is_array(Session::get('status')) )
    <div class="alert alert-success">
        {{ Session::get('status') }}
    </div>
@endif

@if (Session::has('status_error'))
    <div class="alert alert-danger">
        {{ Session::get('status_error') }}
    </div>
@endif

@if (Session::has('swal'))
    @push('scripts')
        <script>
        $(document).ready(function(){
            Swal.fire({!! json_encode(session('swal')) !!});
        });
        </script>
    @endpush
@endif

 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
