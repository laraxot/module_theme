@foreach($form_data[$edit_k] ?? [] as $k => $field)
    <x-input.group type="text" name="{{ $edit_k }}.{{$k}}" />
@endforeach


{{--<pre>{{ print_r($form_data,true) }}</pre>--}}