<div>
    <h4>{{ $label }}</h4>
    @foreach($rows as $row)
        {{--
        <x-input type="checkbox" name="rr" :value="$row" />
        --}}
        @php
            $checked=$value->search($row)!==false;
        @endphp
        <div class="form-check">
            <input class="form-check-input" type="checkbox" 
                value="{{ $row }}" id="check_{{ $row }}" {{ $checked?'checked':'' }}/>
            <label class="form-check-label" for="check_{{ $row }}">
                {{ $row }}
            </label>
        </div>
    @endforeach 
</div>