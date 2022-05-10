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
=======
            <td><livewire:test.row  :row="$v" :index="$loop->index" :key="$v->id" /></td>
>>>>>>> ceab487e (.)

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
