<div>
    <x-input.group type="select" name="disk" :options="['json' => 'json', 'cache' => 'cache']"></x-input.group>
    @error('form_data.disk')
        <span class="alert-danger">{{ $message }}</span>
    @enderror
    <x-input.group type="text" name="filename"></x-input.group>
    @error('form_data.filename')
        <span class="alert-danger">{{ $message }}</span>
    @enderror


    {{-- <x-input.group type="select" name="menus" :options="$menus"></x-input.group> --}}




    <div class="setDataWrap" wire:ignore>
        <button id="getXML" type="button">Get XML Data</button>
        <button id="getJSON" type="button">Get JSON Data</button>
        <button id="getJS" type="button">Get JS Data</button>
        <button id="saveData" type="button">External Save Button</button>
        <button id="loadData" type="button">Load Data</button>
    </div>


    {{-- <h2>Set Data</h2>
    <select name="formTemplates" id="formTemplates" class="form-control">
        <option value="user">User Form</option>
        <option value="terms">Terms Agreement Form</option>
        <option value="issue">Submit Issue Form</option>
        <option value="paperino">paperino</option>
    </select> --}}



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
                const templateSelect = document.getElementById("formTemplates");

                // aggiungo un componente starRating
                var fields = [{
                    label: 'Star Rating',
                    attrs: {
                        type: 'starRating'
                    },
                    icon: '🌟'
                }, ];

                const templates = {
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
                    const result = formBuilder.actions.save();
                    @this.call('saveData', result);

                });

                document.getElementById("loadData").addEventListener("click", () => {
                    console.log('loadData');
                    const data = @this.call('getData');
                    console.log(data);

                    var form_data = data.then(value => {
                        formBuilder.actions.setData(value);
                        console.log(value);
                    }).catch(err => {
                        console.log(err);
                    });

                    // con queste 2 righe funziona
                    // var formData =
                    //     '[{"type":"text","label":"Full Name","subtype":"text","className":"form-control","name":"text-1476748004559"},{"type":"select","label":"Occupation","className":"form-control","name":"select-1476748006618","values":[{"label":"Street Sweeper","value":"option-1","selected":true},{"label":"Moth Man","value":"option-2"},{"label":"Chemist","value":"option-3"}]},{"type":"textarea","label":"Short Bio","rows":"5","className":"form-control","name":"textarea-1476748007461"}]';
                    // formBuilder.actions.setData(formData);


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
