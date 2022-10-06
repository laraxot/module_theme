<div>
    <div class="row">
        <div class="col-4 h-100" style="border-right:1px solid darkgrey;" id='left-defaults' class="container">
            @foreach ($blade_components as $k => $component)
                @if (strpos($component->comp_name, '.') === false)
                    <div class="list-group-item list-group-item-info" name="{{$k}}">
                        {{ $component->comp_name }}</div>
                @endif
            @endforeach
        </div>
        <div class="col-4 h-100" id='right-defaults' class="container">
            
            @foreach ($form_elements as $k => $element)
                <div class="list-group-item list-group-item-info" wire:click="deleteComponentFromForm({{$k}})" name="{{ $element['class_name'] }}">{{ $element['comp_name'] }}</div>
            @endforeach
        </div>
        <div class="col-4 h-100" style="border-left:1px solid darkgrey;">Properties
        <div>
            <pre>
            @php
               echo  var_export($form_elements,true);
            @endphp
            </pre>
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
