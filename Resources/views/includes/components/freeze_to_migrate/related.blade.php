<table>
@foreach($rows as $v)
    @if($loop->first)
        <tr>
        @foreach($fields as $vf)
            <td>{{  $vf->name }} </td>
        @endforeach
        </tr>
    @endif
    <tr>
    @foreach($fields as $vf)
        @php
            $val=$v->{$vf->name};
        @endphp
        <td>{{ $val }}</td>
    @endforeach
    </tr>
@endforeach
</table>
<a href="{{ $manage_url }}" class="btn btn-warning">&nbsp;Manage</a>
