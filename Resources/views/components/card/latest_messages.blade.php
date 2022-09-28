<div class="cmp-card-latest-messages mb-3 {{$cmp_card_class??''}}" data-bs-toggle="modal" data-bs-target="#{{$modalId}}" id="{{$id}}">
  <div class="card shadow-sm px-4 pt-4 pb-4 @if($cardRounded??'') rounded @endif ">
    <div class="card-header border-0 p-0 @if($header_m0) m-0 @endif ">
      @if($date)
            <date class="date-xsmall">{{$date}}</date>
     @endif
     @if(isset($text_small))
      <p class="title-xsmall-bold mb-2 {{$text_small_class}}">{{$text_small??''}}</p>
      @endif
      @if(isset($category))
        <a class="text-decoration-none title-xsmall-bold mb-2 category {{$category_class}}" href="#">{{$category}}</a>
      @endif
    </div>
    <div class="card-body p-0 my-2">
      @if(isset($card_title))
      <h3 class="title-small-semi-bold t-primary m-0 mb-1"><a href="#" class="text-decoration-none">{{$card_title}}</a></h3>
      @endif
      @if(isset($green_title_big))
      <h3 class="green-title-big t-primary mb-8"><a href="#" class="text-decoration-none" data-element="service-link">{{$green_title_big}}</a></h3>
      @endif
      @if(isset($description))
      <p class="text-paragraph {{$description_class}}">{{$description}}</p>
      @endif
    </div>
  </div>
</div>
