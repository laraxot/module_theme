@php
$model = Form::getModel();
//dddx($model->post_type);
//dddx($params);
@endphp
<div class="form-group">
    <div class="col-md-4">
    </div>
    <div class="col-md-6">
        <button type="submit" name="_action" value="save_continue" class="btn btn-info">Save &amp; Continue</button>
        <button type="submit" name="_action" value="save_close" class="btn btn-success">Save &amp; Close</button>
        {{-- <button type="submit" name="_action" value="exit" class="btn btn-danger">Exit</button> --}}
        <a href="./" class="btn btn-danger">Exit</a>
    </div>
</div>
