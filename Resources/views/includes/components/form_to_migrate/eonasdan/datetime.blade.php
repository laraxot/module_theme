{{	Theme::add('/theme/bc/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
{{	Theme::add('/theme/bc/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}
{{	Theme::add('/theme/bc/bootstrap-datepicker/dist/locales/bootstrap-datepicker.it.min.js') }}   

<div class='col-sm-6'>
    <div class="form-group">
        <div class='input-group date eondatetime' >
            <input type='text' class="form-control" />
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
    </div>
</div>


{{  Theme::add('backend::includes/components/form/eonasdan/js/bsDatetime.js') }}	   
