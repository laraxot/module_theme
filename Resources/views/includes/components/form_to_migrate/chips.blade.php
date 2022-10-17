<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
	{{ Form::label($name,  trans($view.'.field.'.$name), ['class' => 'col-md-4 control-label']) }}
	<div class="col-md-6">
		{{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
<<<<<<< HEAD

=======
    
>>>>>>> ede0df7 (first)
		@if ( $errors->has($name) )
			<span class="help-block">
				<strong>{{ $errors->first($name) }}</strong>
			</span>
		@endif
	</div>
</div>
value:{{ $value }}
@php
//  $val=Form::getValueAttribute($name)->get();
@endphp
<<<<<<< HEAD
{{--
=======
{{-- 
>>>>>>> ede0df7 (first)
bower install --save bootstrap-tagsinput/bootstrap-tagsinput

GET: retrieve resources
POST: create resources
PUT: update resources
DELETE: delete resources

 --}}
{{ Theme::add('theme/bc/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}
{{ Theme::add('theme/bc/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}
{{ Theme::add('theme/bc/typeahead.js/dist/typeahead.bundle.min.js') }}
@push('scripts')
<script>
var chips = new Bloodhound({
	datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
	queryTokenizer: Bloodhound.tokenizers.whitespace,
	//prefetch: 'assets/cities.json'
	prefetch: {
		//url: 'assets/citynames.json',
		url: '/api/ingredients',
		filter: function(list) {
			return $.map(list, function(cityname) {
<<<<<<< HEAD
				return { name: cityname };
=======
				return { name: cityname }; 
>>>>>>> ede0df7 (first)
			});
		}
	}
});
chips.initialize();

var elt = $('input[name="{{ $name }}"]');
elt.tagsinput({
  //itemValue: 'value',
  //itemText: 'text',
  typeaheadjs: {
    name: 'chips',
    displayKey: 'name',
    valueKey: 'name',
    source: chips.ttAdapter()
  }
});
<<<<<<< HEAD
{{--
=======
{{--  
>>>>>>> ede0df7 (first)
@foreach($val as $row)
elt.tagsinput('add', { "value": {{ $row->post_id }} , "text": "{{ $row->title }}" });
@endforeach
elt.tagsinput('add', { "value": 4 , "text": "Washington"  , "continent": "America"   });
elt.tagsinput('add', { "value": 7 , "text": "Sydney"      , "continent": "Australia" });
elt.tagsinput('add', { "value": 10, "text": "Beijing"     , "continent": "Asia"      });
elt.tagsinput('add', { "value": 13, "text": "Cairo"       , "continent": "Africa"    });
--}}
</script>
@endpush