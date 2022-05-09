{{-- 
https://mdbootstrap.com/javascript/time-picker/
http://t00rk.github.io/bootstrap-material-datetimepicker/
http://www.jqueryscript.net/time-clock/Pretty-Date-Time-Picker-Plugin-For-Bootstrap-Material.html
https://fezvrasta.github.io/bootstrap-material-design/
https://codepen.io/SimeonC/pen/XJdWPy
https://getmdl.io/components/index.html#cards-section

 --}}

<div class="md-form">
    <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker">
    <label for="date-picker-example">Try me...</label>
</div>

<div class="md-form">
    <input placeholder="Selected time" type="text" id="input_starttime" class="form-control timepicker">
    <label for="input_starttime">Light version, 12hours</label>
</div>

{{ Theme::add('theme/bc/jquery/dist/jquery.min.js') }}

{{ Theme::add('theme/bc/tether/dist/css/tether.min.css') }}
{{ Theme::add('theme/bc/tether/dist/js/tether.min.js') }}
{{--  
--}}
{{--  
{{ Theme::add('theme/bc/pickadate/lib/picker.js') }}
{{ Theme::add('theme/bc/pickadate/lib/picker.date.js') }}
{{ Theme::add('theme/bc/pickadate/lib/picker.time.js') }}
{{ Theme::add('theme/bc/pickadate/lib/themes/classic.css') }}
{{ Theme::add('theme/bc/pickadate/lib/themes/classic.date.css') }}
--}}

{{ Theme::add('theme/bc/MDBootstrap/css/mdb.css') }}
{{ Theme::add('theme/bc/MDBootstrap/js/mdb.js') }}
{{-- a pagamento han ricompilato pickadate con un tema piu' carino --}}
{{ Theme::add('backend::css/mdb.css') }}
{{ Theme::add('backend::js/mdb.js') }}

{{ Theme::add('backend::js/bsDatetime_md.js') }}