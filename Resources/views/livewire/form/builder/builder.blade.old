<div>
    <div class="row">
        <div class="col-4 h-100" style="border-right:1px solid darkgrey;" id='left-defaults' class="container">
            @foreach ($blade_components as $k => $component)
                @if (strpos($component->comp_name, '.') === false)
                    <div class="list-group-item list-group-item-info" name="{{ $k }}">
                        {{ $component->comp_name }}</div>
                @endif
            @endforeach
        </div>
        <div class="col-4 h-100" id='right-defaults' class="container">

            @foreach ($form_elements as $k => $element)
                {{-- <div class="list-group-item list-group-item-info d-inline-block col-md-10"
                    wire:click="selectElement({{ $k }})" name="{{ $element['class_name'] }}">
                </div> --}}

                <div class="row clearfix">
                    <div wire:click="selectElement({{ $k }})" class="d-inline-block col-md-10">
                        <x-{{ $element['comp_name'] }} name="{{ $element['props'][0]['value'] ?? '' }}"
                            class="{{ $element['props'][2]['value'] ?? '' }}">
                            {{ $element['props'][1]['value'] ?? '---' }}
                            </x-{{ $element['comp_name'] }}>
                    </div>

                    <div class="d-inline-block float-right col-md-2 text-center bg-danger list-group-item list-group-item-info"
                        style="cursor:pointer" wire:click="deleteComponentFromForm({{ $k }})"
                        name="{{ $element['class_name'] }}">X
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-4 h-100" style="border-left:1px solid darkgrey;">Properties
            <div>
                @if (isset($selected_element))
                    <h3>{{ $selected_element['comp_name'] }}</h3>
                    @foreach ($selected_element['props'] as $kp => $prop)
                        <input class="form-control"
                            wire:model="form_elements.{{ $index }}.props.{{ $kp }}.value"
                            name="{{ Str::slug($prop['name']) }}"
                            placeholder="{{ $prop['placeholder'] ?? $prop['name'] }}" type="text">
                    @endforeach
                    <pre>
                    @php
                        echo var_export($form_elements, true);
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
