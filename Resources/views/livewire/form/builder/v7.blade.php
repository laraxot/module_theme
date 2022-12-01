<div>
    <x-input.group type="select" name="disk" :options="['json' => 'json', 'cache' => 'cache']"></x-input.group>
    <x-input.group type="text" name="filename"></x-input.group>


    <div class="setDataWrap" wire:ignore>
        <button id="getXML" type="button">Get XML Data</button>
        <button id="getJSON" type="button">Get JSON Data</button>
        <button id="getJS" type="button">Get JS Data</button>
        <button id="saveData" type="button">External Save Button</button>
        <button id="loadData" type="button">Load Data</button>
    </div>
    <div class="build-wrap form-wrapper-div" id="build-wrap" wire:ignore></div>
    {{-- <div id="build-wrap"></div> --}}
    {{-- <div class="render-wrap"></div> --}}
    {{-- <button id="edit-form">Edit Form</button> --}}




    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        <script src="https://formbuilder.online/assets/js/form-builder.min.js"></script>
        <script>
            $(function() {
                var fbEditor = document.getElementById('build-wrap');


                // aggiungo un componente starRating
                var fields = [{
                    label: 'Star Rating',
                    attrs: {
                        type: 'starRating'
                    },
                    icon: '🌟'
                }, ];
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


                // funzione .formBuilder renderizza il formbuilder
                var formBuilder = $(fbEditor).formBuilder({
                    templates,
                    fields
                });




                // bottoni per visualizzare il risultato
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

                document.getElementById("saveData").addEventListener("click", () => {
                    console.log('livewire');
                    console.log(Livewire);
                    // console.log("external save clicked");
                    const result = formBuilder.actions.save();
                    @this.call('saveData', result);

                });

                document.getElementById("loadData").addEventListener("click", () => {
                    console.log('loadData');
                    //console.log(@this.call('getData'));
                    // $(container).formRender('setData', templates[e.target.value]);
                    //formBuilder.actions.setData(@this.call('getData'));
                    // formBuilder.actions.setData({{ $data }});
                });


            });
        </script>
    @endpush
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
</div>
