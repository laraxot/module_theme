@props([
    // 'class',
    'id',
    'visible' => false,
    'placeholder' => 'Dettagli*',
    'required' => false,
    'textareaClass' => '',
    'num',
    'maxlength',
    'labelClass' => ''
])
<div class="cmp-text-area {{ $class }} {{ $attributes->class(['cmp-text-area']) }}">
    <div class="form-group">
      <label for="{{$id}}" class="{{ $visible?'d-block':'visually-hidden' }}">{{ $placeholder }}@if($required)*@endif</label>
      <textarea class="text-area {{$textareaClass}}" id="{{$id}}" rows="{{ $num }}"
      @if($required) required @endif @if(isset($maxlength)) maxlength="{{$maxlength}}" @endif></textarea>

    @if($label)
    <span class="label {{$labelClass}}">{{$label}}</span>
    @endif
    </div>

  </div>
