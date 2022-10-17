@php
//https://italia.github.io/bootstrap-italia/docs/form/input/#area-di-testo

/*
  <div>
    <div class="form-group">
      <textarea id="exampleFormControlTextarea1" rows="3"></textarea>
      <label for="exampleFormControlTextarea1">Esempio di area di testo</label>
    </div>
  </div>
  */

/*
      <x-theme::input
        label="text_area"
        type="textarea"
        name="textarea_input"
        id="text_area_example"
        rows="10"
        cols="25"
        />
  */
  //meglio usare wysiwyg o similare
@endphp

<textarea {{ $attributes->merge($attrs) }}></textarea>
