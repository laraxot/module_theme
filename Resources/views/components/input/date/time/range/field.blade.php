<div class="datetime_range_picker" id="{{ Str::slug($name) }}"
    style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
<div style="display:none">
<br/>{{ $name }}<br/>
<input type="text" name="{{ $name }}_from" wire:model.lazy="form_data.{{ $name }}_from">
<input type="text" name="{{ $name }}_to" wire:model.lazy="form_data.{{ $name }}_to">
</div>

@push('scripts')
<script>
    $(function() {
        moment.locale('it');
        var start = moment($('[name="{{ $name }}_from"]').val());
        var end = moment($('[name="{{ $name }}_to"]').val());
       
        function cb(start, end) {
            //*
            $('#{{Str::slug($name)}} span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('[name="{{ $name }}_from"]').val(start.format('yyyy-MM-DDTHH:mm:ss'))
            $('[name="{{ $name }}_to"]').val(end.format('yyyy-MM-DDTHH:mm:ss'))
            //console.log("{{$name}}");
            @this.emit('setFormDataValueEvent',"{{ $name }}_from",start.format('yyyy-MM-DDTHH:mm:ss'));
            @this.emit('setFormDataValueEvent',"{{ $name }}_to",end.format('yyyy-MM-DDTHH:mm:ss'));
            @this.emit('updatedFormDataRowsEvent',@this.form_data);
           
        }
        
        $('#{{Str::slug($name)}}').daterangepicker(
            {
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
            }
        , cb);

        cb(start, end);

});
    
</script>
@endpush
