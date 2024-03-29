<div>
    <div class="row">
        <div class="col-4 h-100" style="border-right:1px solid darkgrey;" id='left-defaults' class="container">
            @foreach ($blade_components as $k => $component)
                {{-- @if (strpos($component->comp_name, '.') === false) --}}
                <div class="list-group-item list-group-item-info" name="{{ $k }}">
                    {{ $component->comp_name }}</div>
                {{-- @endif --}}
            @endforeach
        </div>
        <div class="col-4 h-100" id='right-defaults' class="container">

            @foreach ($form_elements as $k => $element)
                {{-- @php
                    $element['props'] = collect($element['props'])
                        ->pluck('value', 'name')
                        ->toArray();
                @endphp --}}

                <div class="row clearfix">
                    <div wire:click="selectElement({{ $k }})" class="d-inline-block col-md-11">
                        @php
                            // so che non andrebbe qui la logica ma non so come farla in modo diverso
                            // prova input.text e input.search
                            // e input.field
                            $component = '<x-' . $element['comp_name'];
                            foreach ($element['props'] as $prop) {
                                if ($prop['prop_type'] === 'constructor' && ($prop['value'] !== '' || $prop['required'] === 'true')) {
                                    $component .= ' ';
                                    if ($prop['type'] === 'String' && $prop['type'] === '') {
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
                        @endphp
                        {!! $this->bladeCompile($component) !!}
                    </div>

                    <div class="d-inline-block float-right col-md-1 text-center bg-danger rounded-circle p-2"
                        style="cursor:pointer" wire:click="deleteComponentFromForm({{ $k }})"
                        name="{{ $element['class_name'] }}">X
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4 h-100" style="border-left:1px solid darkgrey;">
            <div>
                @if (isset($selected_element))
                    <h1>{{ $selected_element['comp_name'] }}</h1>

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
                        //echo var_export($form_elements, true);
                    @endphp
                </pre>
                @endif
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
            console.log($(el).attr('name'))
            Livewire.emit('addComponentToForm', $(el).attr('name'))
        })
    </script>
@endpush
