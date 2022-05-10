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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            <td><livewire:test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
=======
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> b6141c95 (first)
=======
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> 6aa89a58 (first)
=======
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> ede0df75 (first)
=======
            <td><livewire:test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> ceab487e (.)
=======
            <td><livewire:test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> 7f97b271 (up)
=======
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> b6141c95 (first)
=======
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> 6aa89a58 (first)
=======
            <td><livewire:theme::test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> ede0df75 (first)

        </tr>
    @endforeach
</table> --}}
    <table class="table table-bordered">
        <form wire:submit.prevent="rowsUpdate">
            @foreach ($rows as $k => $v)
                @php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    $panel_fields = Panel::make()
                        ->get($v)
                        ->getFields(['act' => 'edit']);
=======
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
>>>>>>> b6141c95 (first)
=======
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
>>>>>>> 6aa89a58 (first)
=======
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
>>>>>>> ede0df75 (first)
=======
                    $panel_fields = Panel::make()
                        ->get($v)
                        ->getFields(['act' => 'edit']);
>>>>>>> 7f97b271 (up)
=======
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
>>>>>>> b6141c95 (first)
=======
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
>>>>>>> 6aa89a58 (first)
=======
                    $panel_fields = Panel::make()->get($v)->getFields(['act' => 'edit']);
>>>>>>> ede0df75 (first)
                    $fields = [];
                    foreach ($panel_fields as $field) {
                        $fields[] = $this->makeField($field->name, $field->type);
                    }
                @endphp
                @if ($loop->first)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                    <livewire:datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-' . $v->id" />
=======
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> b6141c95 (first)
=======
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> 6aa89a58 (first)
=======
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> ede0df75 (first)
=======
                    <livewire:datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> ceab487e (.)
=======
                    <livewire:datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-' . $v->id" />
>>>>>>> 7f97b271 (up)
=======
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> b6141c95 (first)
=======
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> 6aa89a58 (first)
=======
                    <livewire:theme::datagrid_editable.head :row="$v" :index="$loop->index" :key="'head-'.$v->id" />
>>>>>>> ede0df75 (first)
                    {{-- <tr>
                @foreach ($fields as $field)
                    <th>
                        {{ $field->label }}
                    </th>
                @endforeach
            </tr> --}}
                @endif
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
                <livewire:datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-' . $v->id" />
=======
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> b6141c95 (first)
=======
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> 6aa89a58 (first)
=======
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> ede0df75 (first)
=======
                <livewire:datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> ceab487e (.)
=======
                <livewire:datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-' . $v->id" />
>>>>>>> 7f97b271 (up)
=======
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> b6141c95 (first)
=======
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> 6aa89a58 (first)
=======
                <livewire:theme::datagrid_editable.row :row="$v" :index="$loop->index" :key="'row-'.$v->id" />
>>>>>>> ede0df75 (first)
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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> b6141c95 (first)
=======

>>>>>>> 6aa89a58 (first)
=======

>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======

>>>>>>> b6141c95 (first)
=======

>>>>>>> 6aa89a58 (first)
=======

>>>>>>> ede0df75 (first)
    @endcomponent


</div>
