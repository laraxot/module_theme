<<<<<<< HEAD
@include('theme::layouts.default.admin.common.action')
=======
@extends('adm_theme::layouts.app')
@section('content')
<div class="row">
    <div class="col" style="overflow:auto">
        @foreach($rows as $k=>$v)
        @php
        // nella lista la password e conferma password posso ometterle
        /*
        $fields=collect($_panel->fields())->filter(function($item){
            return !in_array($item->type,['Password']);
        })->all();
        */

        $fields=$_panel->indexFields();
        //$row_panel=$_panel;
        $row_panel=Panel::get($row);
        $row_panel->setParent($_panel->getParent());
        //dddx([$_panel,$row_panel]);

    @endphp
    @if($loop->first)
    <table>
        <thead>
            <tr>
                @foreach($fields as $field)
                <td>{{ str_replace('_',' ',$field->name) }}</td>
                @endforeach
                <td></td>
            </tr>
        </thead>
        <tbody>
            @endif
            <tr>
                @foreach($fields as $field)
                    <td>
                        {!! Theme::inputFreeze(['row'=>$row,'field'=>$field]) !!}

                        @if($loop->first)
                            @foreach($row_panel->itemActions() as $act)
                                {!! $act->btnHtml() !!}
                            @endforeach
                        @endif
                    </td>
                @endforeach
                <td>
                    {!! Form::bsBtnCrud(['row'=>$row]) !!}
                    {!! $row_panel->btnCrud() !!}
                </td>
            </tr>
            @if($loop->last)
        </tbody>
    </table>
    @endif

		@endforeach
		{{ $rows->appends(request()->query())->links() }}
	</div>
</div>

@endsection
{{--
    @include('theme::layouts.default.admin.common.action')
--}}
>>>>>>> b5b3db24c41d93315b0c66431c0d1b9bda40e2b3

