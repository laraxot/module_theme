<div>
    <div class="row">
        <div class="col-4 overflow-auto" style="height:85vh !important;border-right:1px solid darkgrey;" id='left-defaults'
            class="container">
            @foreach (collect($blade_components)->unique('types.0') as $k => $component)
                <div class="card-header ui-sortable-handle mb-2" name="{{ $k }}">
                    <h3 class="card-title">{{ $component->types[0] }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool"
                            wire:click="addComponentToForm('{{ $k }}')">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4 overflow-auto" style="height:85vh !important;" id='right-defaults' class="container">

            @foreach ($form_elements as $k => $element)
                <div class="row clearfix">
                    <div class="col-md-10 d-flex align-items-center">
                        @php
                            // so che non andrebbe qui la logica ma non so come farla in modo diverso
                            // prova input.text e input.search
                            // e input.field
                            $component = '<x-' . $element['comp_name'];
                            foreach ($element['props'] as $prop) {
                                if ($prop['prop_type'] === 'constructor' && ($prop['value'] !== '' || $prop['required'] === 'true')) {
                                    $component .= ' ';
                                    if ($prop['type'] !== 'String' && $prop['type'] !== '') {
                                        $component .= ':';
                                    }
                                    $component .= $prop['name'] . '="' . $prop['value'] . '" ';
                                }
                            }
                            $component .= '>';
                            foreach ($element['props'] as $prop) {
                                if ($prop['prop_type'] === 'slot' && ($prop['value'] !== '' || $prop['required'] === 'true')) {
                                    $component .= '<x-slot name="' . $prop['name'] . '">' . $prop['value'] . '</x-slot>';
                                }
                            }
                            $component .= '</x-' . $element['comp_name'] . '>';
                            //dddx($element);
                        @endphp
                        {!! $this->bladeCompile($component) !!}
                    </div>

                    <div class="col-md-1 d-flex align-items-center">
                        <button type="button" class="btn btn-tool btn-info"
                            wire:click="selectElement({{ $k }})">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>

                    <div class="col-md-1 d-flex align-items-center">
                        <button type="button" class="btn btn-tool btn-danger"
                            wire:click="deleteComponentFromForm({{ $k }})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4 h-100" style="border-left:1px solid darkgrey;">
            <div>
                @if (isset($selected_element))
                    {{-- dddx(collect($selected_element['props'])->where('name','type')) --}}
                    <h1>{{ collect($selected_element['props'])->where('name', 'type')->first()['value'] }}</h1>

                    <h3>Constructor</h3>
                    @foreach (collect($selected_element['props'])->where('prop_type', 'constructor')->toArray() as $kp => $prop)
                        <input class="form-control"
                            wire:model="form_elements.{{ $index }}.props.{{ $kp }}.value"
                            name="{{ Str::slug($prop['name']) }}"
                            placeholder="{{ $prop['placeholder'] ?? $prop['name'] }}" type="text">
                    @endforeach

                    <h3>Slots</h3>
                    @foreach (collect($selected_element['props'])->where('prop_type', 'slot')->toArray() as $kp => $prop)
                        <input class="form-control"
                            wire:model="form_elements.{{ $index }}.props.{{ $kp }}.value"
                            name="{{ Str::slug($prop['name']) }}"
                            placeholder="{{ $prop['placeholder'] ?? $prop['name'] }}" type="text">
                    @endforeach
                    <pre>
                    @php
                        //echo var_export($htmlForm, true);
                    @endphp
                </pre>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <input type="text" class="form-control" name="form_name" wire:model.lazy="form_name">
                <button class="btn btn-primary" wire:click="saveForm()">Save Form</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var drake = dragula([document.getElementById('left-defaults'), document.getElementById('right-defaults')], {
            copy: function(el, source) {
                return source === document.getElementById('left-defaults')
            },
            accepts: function(el, target) {
                return target !== document.getElementById('left-defaults')
            }
        });

        drake.on('drop', (el, target, source, sibling) => {
            //console.log($(el).attr('name'))
            Livewire.emit('addComponentToForm', $(el).attr('name'))
        })
    </script>
@endpush
