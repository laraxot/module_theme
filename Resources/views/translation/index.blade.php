<form action="{{ route('container0.store',$params) }}" method="POST">
	@csrf
	@method('post')
	@foreach(Theme::__getStatic('langs') as $k=>$v)
		<label>{{$k}}</label>
		<input type="text" name="trans[{{ $k }}]" value="{{ $v }}" class="form-control"><br/>
	@endforeach
<input type="submit" value="aggiorna" >
</form>
