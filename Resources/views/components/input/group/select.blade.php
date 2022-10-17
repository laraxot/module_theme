@props(['id', 'type_input' => 'select'])
<div class="form-group cmp-input {{$formClass ?? ''}}">
<label class="cmp-input__label" for="{{$id}}">{{$label ?? ''}} @if(isset($required)) * @endif</label>
    <input
type="{{$type_input}}"
class="form-control {{$inputClass ?? ''}}"
id="{{$id}}"
name={{$id}}
{{-- {{ isset($placeholder)?'placeholder="{{$placeholder}}':'' }}
{{ isset($required)?'required':'' }}
{{ isset($disabled)?'disabled':'' }}
{{ isset($value)?'value="{{$value}}':'' }} --}}

@if(isset($placeholder)) placeholder="{{$placeholder}}" @endif
@if(isset($required)) required  @endif
@if(isset($disabled)) disabled  @endif
@if(isset($value)) value="{{$value}}" @endif
>
@if(isset($address))
<span class="cmp-input__icon-input">
    <svg class="icon icon-sm"><use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-map-marker-circle"></use></svg>
</span>
    @endif

@if(isset($txt))
    <div class="d-flex">
    <span class="form-text cmp-input__text">
    {{$txt}}</span>
    </div>
@endif
</div>

