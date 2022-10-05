<div>
    <div class="row">
        <div class="col-4 h-100" style="border-right:1px solid darkgrey;" id='left-defaults' class="container">
            @foreach($blade_components as $component)
                @if(strpos($component->comp_name,'.')===false)
                    <div class="list-group-item list-group-item-info">{{ $component->comp_name }}</div>
                @endif
            @endforeach
        </div>
        <div class="col-4 h-100" id='right-defaults'  class="container">
            <div>u</div>
        </div>
        <div class="col-4 h-100" style="border-left:1px solid darkgrey;">props</div>
    </div>
</div>

@push('scripts')
<script>
    var drake = dragula([document.getElementById('left-defaults'), document.getElementById('right-defaults')],{
        copy: function (el, source) {
            return source === document.getElementById('left-defaults')
        },
        accepts: function (el, target) {
            return target !== document.getElementById('left-defaults')
        }
    });
</script>
@endpush