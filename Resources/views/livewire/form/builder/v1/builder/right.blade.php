@foreach ($form_edit as $k => $v)
    <x-input.group.arr :arr="$v" />

    {{--  
        <pre>{{ print_r($v,true) }}</pre>
    --}}
@endforeach


<pre>{{ print_r($form_data, true) }}</pre>
