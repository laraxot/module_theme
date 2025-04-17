@props([
  'no_link' => false,
  'label'
])


@if($no_link)
<div class="chip chip-simple {{$class ?? ''}}" href="#" 


@if(isset($data_element)) data-element="{{$data_element}}" @endif

{{-- {{#if data-element}}data-element="{{data-element}}"{{/if}} --}}

>
  <span class="chip-label">{{$label}}</span>
</div>
@else
<a class="chip chip-simple {{$class ?? ''}}" href="#" 

@if(isset($data_element)) data-element="{{$data_element}}" @endif

{{-- {{#if data-element}}data-element="{{data-element}}"{{/if}} --}}

>
  <span class="chip-label">{{$label}}</span>
</a>
@endif


{{-- <div class="cmp-tag">
  <a class="chip chip-simple {{$class ?? ''}} text-decoration-none" href="#" data-element="service-topic">
    <span class="chip-label">{{$label_tag ?? ''}}{{$label_tag_up ?? ''}}</span>
  </a>
</div> --}}
