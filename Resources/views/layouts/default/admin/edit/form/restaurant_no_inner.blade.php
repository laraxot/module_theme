{!! Form::bsOpen($row,'store',"",null,"createRestaurantForm") !!}
{{--
@if (count($errors) > 0)
<<<<<<< HEAD

=======
 
>>>>>>> ede0df7 (first)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $k=>$error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif
--}}
<div class="row">
	<div class="form-group col-sm-12">
	{!! Form::bsText('title',null,['required'=>'required']) !!}
	</div>
	<div class="form-group col-sm-12">
	{!! Form::bsText('subtitle') !!}
	</div>
	<div class="form-group col-sm-12">
	{!! Form::bsText('website') !!}
	</div>
	<div class="form-group col-sm-12">
<<<<<<< HEAD
	{{-- Form::bsUploadSingleImg('thumbnail') --}}
	{{--
	Form::bsDropZone('image_src')
	{!! Form::bsUploadImg('image_src') !!}
	--}}
	{!! Form::bsHtml5UploadImg('image_src') !!}

=======
	{{-- Form::bsUploadSingleImg('thumbnail') --}} 
	{{-- 
	Form::bsDropZone('image_src') 
	{!! Form::bsUploadImg('image_src') !!}
	--}}
	{!! Form::bsHtml5UploadImg('image_src') !!}
	
>>>>>>> ede0df7 (first)
	</div>
	<div class="form-group col-sm-6">
	{!! Form::bsText('email') !!}
	</div>
	<div class="form-group col-sm-6">
	{!! Form::bsText('phone') !!}
	</div>
	<div class="form-group col-sm-12">
	{!! Form::bsTextarea('txt') !!}
	</div>
	<div class="form-group col-sm-12">
	{!! Form::bsAddress('address') !!}
	</div>
	<div class="form-group col-sm-12">
		{!! Form::bsTextarea('rules-doc',null,["readonly"]) !!}
	</div>
	<div class="form-group col-sm-6">
		{!! Form::bsPrvCheckbox('accept_rules') !!}
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		{{ Form::bsSubmit(__($view.'.submit'),null,['class'=>"btn btn-red btn-round", 'style'=>"border-radius: 0px 25px 0px 25px; box-shadow: -2px 2px 2px 2px #0000008a;"]) }}
	</div>
</div>
{!! Form::close() !!}