<div class="row">
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissable">
            <i class="fas fa-check-circle"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! Session::get('message') !!}
        </div>
    @endif
    @if (count($errors) > 0)
    
        @if(!Session::has('error'))
        <div class="alert alert-danger alert-dismissable">
            <i class="fas fa-ban"></i>
            <b>{!! Lang::get('ticket::txt.alert') !!} !</b>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    @endif

    @foreach($form->inputs as $input)
        <x-input.group :field="$input" ></x-input.group>
    @endforeach 

    <div class="col-md-12 form-group">
        {!! Form::submit(Lang::get('ticket::txt.submit'),['class'=>'btn btn-info float-right', 'onclick' => 'this.disabled=true;this.value="Sending, please wait...";this.form.submit();'])!!}
    </div>

</div>