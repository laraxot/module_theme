<div>
    @php
        //dddx($rows);
    @endphp

    <h3>page:{{ $page }} total records:{{ $total }}</h3>
    {{-- @foreach ($route_params as $k => $v)
<br/>{{ $k }} : {{ $v }}
@endforeach
count : {{ $rows->count() }}
<table class="table table-bordered" >
    @foreach ($rows as $k => $v)
        <tr>
            <td> {{ $k }} </td><td> {{ $v->id }}</td>
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>

        </tr>
    @endforeach
</table> --}}
    @if (session()->has('error_message'))
        <div class="alert alert-danger" style="margin-top:30px;">x
            {{ session('error_message') }}
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered">
        <form wire:submit.prevent="rowsUpdate">
            @foreach ($rows as $k => $v)
                @php
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
                    $fields = [];
                    foreach ($panel_fields as $field) {
                        $fields[] = $this->makeField($field->name, $field->type);
                    }
                @endphp
                @if ($loop->first)
                    <tr>
                        @foreach ($fields as $field)
                            <th>
                                {{ $field->label }}
                            </th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    @foreach ($fields as $field)
                        <td>
                            {{ $field->setPrefix('rows.' . $k)->html() }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
            <button type="submit">Save</button>
        </form>
    </table>

    @component('theme::components.pagination.simple', ['page' => $page, 'per_page' => $per_page, 'total' => $total])

    @endcomponent


</div>
