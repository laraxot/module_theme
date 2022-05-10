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
<<<<<<< HEAD
            <td><livewire:test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
=======
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> b6141c95 (first)

        </tr>
    @endforeach
</table> --}}
    <table class="table table-bordered">
        <form wire:submit.prevent="rowsUpdate">
            @foreach ($rows as $k => $v)
                @php
<<<<<<< HEAD
                    $panel_fields = Panel::make()
                        ->get($v)
                        ->getFields(['act' => 'edit']);
=======
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
>>>>>>> b6141c95 (first)
                    $fields = [];
                    foreach ($panel_fields as $field) {
                        $fields[] = $this->makeField($field->name, $field->type);
                    }
                @endphp
                @if ($loop->first)
<<<<<<< HEAD
                    <livewire:datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-' . $v->id" />
=======
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> b6141c95 (first)
                    {{-- <tr>
                @foreach ($fields as $field)
                    <th>
                        {{ $field->label }}
                    </th>
                @endforeach
            </tr> --}}
                @endif
<<<<<<< HEAD
                <livewire:datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-' . $v->id" />
=======
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> b6141c95 (first)
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
<<<<<<< HEAD
=======

>>>>>>> b6141c95 (first)
    @endcomponent


</div>
