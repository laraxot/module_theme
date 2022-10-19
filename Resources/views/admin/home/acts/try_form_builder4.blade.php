@extends('adm_theme::layouts.app')
@section('content')
    <h3>Form Builder </h3>
    {{-- <livewire:form.builder.v4 /> --}}

    <div class="setDataWrap">
        <button id="getXML" type="button">Get XML Data</button>
        <button id="getJSON" type="button">Get JSON Data</button>
        <button id="getJS" type="button">Get JS Data</button>
    </div>
    {{-- <div class="build-wrap form-wrapper-div"></div> --}}
    <div id="build-wrap"></div>
    {{-- <div class="render-wrap"></div> --}}
    {{-- <button id="edit-form">Edit Form</button> --}}
@endsection

@push('styles')
    <style>
        .form-wrapper-div {
            padding: 20px;
        }

        .form-rendered #build-wrap {
            display: none;
        }

        .render-wrap {
            display: none;
        }

        .form-rendered .render-wrap {
            display: block;
        }

        #edit-form {
            display: none;
            float: right;
        }

        .form-rendered #edit-form {
            display: block;
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
    <script>
        $(function() {
            // $('.build-wrap').formBuilder();
            var fbEditor = document.getElementById('build-wrap');
            var fields = [{
                label: 'Star Rating',
                attrs: {
                    type: 'starRating'
                },
                icon: '🌟'
            }];
            var templates = {
                starRating: function(fieldData) {
                    return {
                        field: '<span id="' + fieldData.name + '">',
                        onRender: function() {
                            $(document.getElementById(fieldData.name)).rateYo({
                                rating: 3.6
                            });
                        }
                    };
                }
            };
            $(fbEditor).formBuilder({
                templates,
                fields
            });
            // var formBuilder = $(fbEditor).formBuilder();

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


        });
    </script>
@endpush
