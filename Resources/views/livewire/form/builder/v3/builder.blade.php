<div>
    <div class="row">
        <div class="col-4 overflow-auto" style="height:85vh !important;border-right:1px solid darkgrey;" id='left-defaults'
            class="container">
            @foreach ($leftSide as $k => $component)
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
            @foreach ($this->form_elements as $k => $element)
                {{-- dddx($element) --}}
                <div class="row clearfix">
                    <div class="col-md-10 d-flex align-items-center">
                        {!! $element['renderedView'] !!}
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
                <input type="text" class="form-control mb-3" name="form_name" wire:model.lazy="form_name">
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
