<select {{ $attributes->merge($attrs) }}>
    <option value="">---</option>
<<<<<<< HEAD
    @if(isset($options))
        @foreach ($options as $k => $v)
            <option value="{{ $k }}" {!! $k == $value ? 'selected' : '' !!}>
                {{ $v }}
            </option>
        @endforeach 
        {{--
        @foreach ($options as $option)
        <option value="{{ $option->id }}"
            {{ $option->id == old('category_id') ? 'selected' : '' }}>
            {{ $option->title }}
        </option>
        @endforeach
        --}}
    @endif
=======
    @foreach ($options as $k => $v)
        <option value="{{ $k }}" {!! $k == $value ? 'selected' : '' !!}>
            {{ $v }}
        </option>
    @endforeach
>>>>>>> ede0df7 (first)
</select>
