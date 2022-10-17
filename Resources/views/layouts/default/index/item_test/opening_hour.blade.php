@php
	$daynames=['sun','mon','tue','wed','thu','fri','sat'];
@endphp
{{ $daynames[$row->day_of_week] }}
<<<<<<< HEAD
@if($row->is_closed)
=======
@if($row->is_closed)	
>>>>>>> ede0df7 (first)
	<span style="color:red">closed</span>
@else
	{{$row->open_at->format('H:i')}} - {{$row->close_at->format('H:i')}}
@endif
<hr/>
{{-- $row->pivot --}}