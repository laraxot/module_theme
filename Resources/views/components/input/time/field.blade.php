@php
  //https://italia.github.io/bootstrap-italia/docs/form/input/#esempi-di-campi-di-input

  /*original
    <div class="form-group">
      <input type="time" class="form-control" id="exampleInputTime" min="9:00" max="18:00">
      <label for="exampleInputTime">Campo di tipo ora</label>
    </div>
  */

  /*esempio utilizzo
      <x-theme::input
        type="time"
        name="time"
        label="time"
        class="form-control"
        id="exampleInputTime"
        min="9:00"
        max="18:00"
        />
  */
@endphp


@component($input_component)
    @slot('label')
        <label>
            {{ $label }}
        </label>
    @endslot
    @slot('input')
        <input type="time" {{ $attributes }} />
    @endslot
@endcomponent