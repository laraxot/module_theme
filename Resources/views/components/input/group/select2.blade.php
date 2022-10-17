@props([
  'no_bg' => false, 
  'id', 
  'label_hidden' => false, 
  'label_class' => '', 
  'required' => false,
  'selectClass',
  'placeholder',
  'options',
  'text' => ''
  ])
<div class="select-wrapper {{$class ?? ''}} {{ $no_bg?'bg-transparent p-0':'select-partials' }}">
  <label for="{{$id}}" class="{{ $label_hidden?'visually-hidden':'' }}" {{$label_class}}>{{$label}}
  {{ $required?'*':'' }}</label>
  <select id="{{$id}}" class="{{ $no_bg?'bg-transparent':'' }} {{$selectClass}}" {{ $required?'required':'' }}>
    <option selected value="">{{$placeholder}}</option>

    {{-- @foreach($options as $item)
    <option value="{{$item->value}}">{{$item->value}}</option>
    @endforeach --}}
  </select>

  @if($text)
  <div class="d-flex {{$text_class}}">
    <span class="form-text cmp-input__text">
      {{$text}}</span>
  </div>
  @endif
</div>
