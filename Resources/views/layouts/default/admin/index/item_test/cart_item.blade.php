<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-6">
			<b>{{ $row->pivot->related->title }}</b>
		</div>
		<!-- end:col -->
<<<<<<< HEAD
		<div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center">
			<span class="price pull-left">€ {{ $row->pivot->price }}</span>
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-4">

		</div>
	</div>
=======
		<div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> 
			<span class="price pull-left">€ {{ $row->pivot->price }}</span>
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-4">
			
		</div>
	</div> 
>>>>>>> ede0df7 (first)
	<!-- end:row -->
{{-- variations --}}
@foreach($row->sons as $son)
<div class="row">
		<div class="col-xs-12 col-sm-6 col-lg-6">
			&nbsp;+&nbsp;{{ $son->pivot->related->title }}
		</div>
		<!-- end:col -->
<<<<<<< HEAD
		<div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center">
			<span class="price pull-left">€ {{ $son->pivot->price }}</span>
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-4">

=======
		<div class="col-xs-6 col-sm-2 col-lg-2 text-xs-center"> 
			<span class="price pull-left">€ {{ $son->pivot->price }}</span>
		</div>
		<div class="col-xs-6 col-sm-4 col-lg-4">
			
>>>>>>> ede0df7 (first)
		</div>
</div>
	<!-- end:row -->
@endforeach
