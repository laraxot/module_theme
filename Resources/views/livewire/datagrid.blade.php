<div>
    <h3>datagrid</h3>
    <table class="table table-bordered">
        <tr>
            <thead>
            @foreach($index_fields as $field)
                @php
                    if(!is_object($field)){
                        $field=(object)$field;
                    }
                @endphp
                    <th>{{ $field->name }}</th>
            @endforeach
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                @foreach($index_fields as $field)
                @php
                    if(!is_object($field)){
                        $field=(object)$field;
                    }
                @endphp
                    <td>{{-- $row->$field->name --}}
                        {!! Theme::inputFreeze(['field'=>$field,'row'=>$row]) !!}
                    </td>
                @endforeach
                </tr>
                @endforeach
            </tbody>
        </tr>
    </table>
     {{ $rows->links() }}
</div>
