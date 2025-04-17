@props([
    'type',
    'class',
    'placeholder' => '',
    'name',
    'formClass',
    'id',
    'required' => false,
    'inputClass' => '',
    'disabled' => false,
    'value' => '',
    'address' => '',
    'text' => ''
])

  <div class="form-group cmp-input {{$formClass}}">
    <label class="cmp-input__label" for="{{$id}}">{{$label}} @if($required) * @endif </label>
     <input
    type="{{$type}}"
    class="form-control {{$inputClass}}"
    id="{{$id}}"
    name={{$id}}
    @if($placeholder) placeholder="{{$placeholder}}"@endif
    @if($required) required @endif
    @if($disabled) disabled @endif
    @if(isset($value)) value="{{$value}}"@endif
  >

    @if($address)
        <span class="cmp-input__icon-input">
            <svg class="icon icon-sm"><use href="../assets/bootstrap-italia/dist/svg/sprites.svg#it-map-marker-circle"></use></svg>
        </span>
    @endif

    @if($text)
      <div class="d-flex">
      <span class="form-text cmp-input__text">
      {{$text}}</span>
      </div>
    @endif
  </div>


