@php
//dddx($field->value);
@endphp
<table>
    @foreach ($field->value as $k => $v)
        @if ($loop->first)
            <tr>
                @foreach ($related_fields as $kf => $vf)
                    <td>{{ str_replace('_', ' ', $vf->name) }}</td>
                @endforeach
            </tr>
        @endif
        {{-- {!! Theme::inputFreeze(['row'=>$row,'field'=>$v]) !!}<br/> --}}
        <tr>
            @foreach ($related_fields as $kf => $vf)
                <td>{!! Theme::inputFreeze(['row' => $v, 'field' => $vf]) !!}</td>
            @endforeach
        </tr>
    @endforeach
</table>
<a href="{{ url($manage_url) }}" class="btn btn-warning"><i class="fas fa-wrench"></i>&nbsp;Manage</a>
