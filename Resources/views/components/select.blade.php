@props(['id', 'no_bg', 'label_class' => '', 'class', 'label_text', 'selectClass' => '', 'placeholder' => ''])
<div class="select-wrapper {{$class}} {{isset($no_bg)?'bg-transparent p-0':'select-partials'}}">
  <label for="{{$id}}" class="{{ isset($label_hidden)?'visually-hidden':'' }}" {{$label_class}}>{{$label_text}}
  {{isset($required)?'*':''}}</label>
  <select id="{{$id}}" class="{{isset($no_bg)?'bg-transparent':''}} {{$selectClass}}" {{isset($required)?'required':''}}>

    <option selected value="">{{$placeholder}}</option>
    {{-- @foreach($options as $item)
        <option value="{{$item->value}}">{{$item->value}}</option>
    @endforeach --}}
  </select>

  @if(isset($text))
  <div class="d-flex {{$text->class}}">
    <span class="form-text cmp-input__text">
      {{$text}}</span>
  </div>
  @endif
</div>