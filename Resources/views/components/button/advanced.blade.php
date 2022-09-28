@if(isset($link))
<a href="#" class=" ps-0
	@if(isset($primary))btn-primary @endif
	@if(isset($secondary))btn-secondary @endif
	@if(isset($outline_primary))btn-outline-primary @endif
	@if(isset($outline_secondary))btn-outline-secondary @endif
	@if(isset($disabled))disabled @endif
	@if(isset($fullMobile))full-mobile @endif
	{{$class}}"
	aria-label="{{$label}}"
	title="{{$label}}">
	@if(isset($icon_url))
	<svg class="icon {{$icon_class}}" aria-hidden="true">
		<use href="{{$icon_url}}" xlink:href="{{$icon_url}}"></use>
	</svg>
	@endif
	{{$label}}
</a>
@else
<button type="button" @if(isset($modalId)) data-bs-toggle="modal" data-bs-target="#{{$modalId}}" @endif
@if(isset($aria_label)) aria-label="{{$aria_label}} @if(isset($btn_label_text)) documento @endif"@endif
class="btn
@if(isset($primary))btn-primary @endif
@if(isset($success))btn-success @endif
@if(isset($secondary))btn-secondary @endif
@if(isset($outline_primary))btn-outline-primary @endif
@if(isset($outline_secondary))btn-outline-secondary @endif
@if(isset($disabled))disabled @endif
@if(isset($fullMobile))full-mobile @endif
@if(isset($bg_white))bg-white @endif
{{$class}}
">
@if(isset($iconBtn))
<span class="rounded-icon">
	<svg class="icon @if(isset($iconWhite)) icon-white @else icon-primary @endif @if(isset($sm)) icon-sm @endif @if(isset($xs))icon-xs @endif {{$class_icon}}" aria-hidden="true">
		<use href="../assets/bootstrap-italia/dist/svg/sprites.svg#{{$iconBtn}}"></use>
	</svg>
</span>
@endif
@if(isset($iconBtnUrl))
<img src="{{$iconBtnUrl}}" alt="{{$label}}" class="me-2">
@endif
<span class="{{$label_class ?? ''}}">{{$label}}</span>
</button>
@endif