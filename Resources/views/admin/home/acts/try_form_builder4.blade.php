@extends('adm_theme::layouts.app')
@section('content')
    <h3>Form Builder </h3>
    {{-- <livewire:form.builder.v4 /> --}}

    <div class="build-wrap form-wrapper-div"></div>
@endsection

@push('styles')
    <style>
        .form-wrapper-div {
            padding: 20px;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script>
        $(function() {
            $('.build-wrap').formBuilder();
        });
    </script>
@endpush
