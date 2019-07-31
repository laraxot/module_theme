{{--
<div class="rating-block"> 
	<i class="fa fa-star-o"></i> 
	<i class="fa fa-star-o"></i> 
	<i class="fa fa-star-o"></i> 
	<i class="fa fa-star-o"></i> 
	<i class="fa fa-star-o"></i> 
<span class="txt-black">{{ $rating_count }} Votes</span>
</div>
--}}
{{--
<ul class="nav nav-inline">
	<li class="nav-item ratings">
		
			<span>
				@for($i=1;$i<=$rating_avg;$i++)
				<i class="fa fa-star"></i>
				@endfor
				@for($i=$rating_avg;$i<5;$i++)
				<i class="fa fa-star-o"></i>
				@endfor
				{{ $rating_count }} Votes
			</span>
	</li>
</ul>
--}}
 @php $rating = $rating_avg; @endphp  
{{--
<div class="rating-block">
@foreach(range(1,5) as $i)
        @if($rating >0)
            @if($rating >0.5)
                <i class="fa fa-star"></i>
            @else
                <i class="fa fa-star-half-o"></i>
            @endif
        @else
        	<i class="fa fa-star-o"></i>
        @endif
        @php $rating--; @endphp
@endforeach
	({{ $rating_avg }}) {{ $rating_count }} votes 
</div >	
--}}
<ul class="nav nav-inline">
	<li class="nav-item ratings">
        <a class="nav-link" href="#"><span>{{ $label ?? ' ' }}
            @foreach(range(1,5) as $i)
                @if($rating >0)
                    @if($rating >0.5)
                        <i class="fa fa-star"></i>
                    @else
                        <i class="fa fa-star-half-o"></i>
                    @endif
                @else
        	       <i class="fa fa-star-o"></i>
                @endif
                @php $rating--; @endphp
            @endforeach
	       ({{ $rating_avg }}) {{ $rating_count }} votes 
        </span></a>
    </li>
</ul >	
