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
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
                    {{-- <tr>
                @foreach ($fields as $field)
                    <th>
                        {{ $field->label }}
                    </th>
                @endforeach
            </tr> --}}
                @endif
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
                {{-- <tr>

            @foreach ($fields as $field)
                <td wire:key="row-field-{{ $v->id }}">
                    {{ $field->setPrefix('rows.'.$k)->html($v) }}
                </td>
            @endforeach
        </tr> --}}
            @endforeach
            <button type="submit">Save</button>
        </form>
    </table>

    @component('theme::components.pagination.simple', ['page' => $page, 'per_page' => $per_page, 'total' => $total])

    @endcomponent


</div>
