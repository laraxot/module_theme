@extends('adm_theme::layouts.app')
@section('content')
    <h3>Form Builder </h3>
    {{-- <livewire:form.builder.v4 /> --}}

    <div class="setDataWrap">
        <button id="getXML" type="button">Get XML Data</button>
        <button id="getJSON" type="button">Get JSON Data</button>
        <button id="getJS" type="button">Get JS Data</button>
    </div>
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

        jQuery(function($) {
            var fbEditor = document.getElementById('build-wrap');
            var formBuilder = $(fbEditor).formBuilder();

            document.getElementById('getXML').addEventListener('click', function() {
                alert(formBuilder.actions.getData('xml'));
            });
            document.getElementById('getJSON').addEventListener('click', function() {
                alert(formBuilder.actions.getData('json'));
            });
            document.getElementById('getJS').addEventListener('click', function() {
                alert('check console');
                console.log(formBuilder.actions.getData());
            });

            document.getElementByClass('.save-template').addEventListener('click', function() {
                alert(formBuilder.actions.getData('json'));
            });
        });
    </script>
@endpush
