@php $rating = $rating_avg; @endphp
<ul class="nav nav-inline">
	<li class="nav-item ratings">
        <a class="nav-link" href="#"><span>{{ $label ?? ' ' }}
            @foreach(range(1,5) as $i)
                @if($rating >0)
                    @if($rating >0.5)
                        {{--
                        <i class="fa fa-star"></i>
                        --}}
                        <i class="fas fa-star"></i>
                    @else
                        <i class="fas fa-star-half-alt"></i>
                        {{--
                        <i class="fa fa-star-half-o"></i>
                        --}}
                    @endif
                @else
                    <i class="far fa-star"></i>
                    {{--
        	        <i class="fa fa-star-o"></i>
                    --}}
                @endif
                @php $rating--; @endphp
            @endforeach
	       ({{ $rating_avg }}) {{ $rating_count }} votes
        </span></a>
    </li>
</ul >
