{{--
<select class="selectpickerform-control" name="category" id="form_category" multiple="multiple" data-style="btn-selectpicker"
    data-selected-text-format="count &gt; 1" data-none-selected-text="">
--}}
<select {{ $attributes->merge($attrs) }} >
    @foreach ($options as $key => $value)
        <option value="{{ $key }}">{{ $value }} </option>
    @endforeach
</select>
