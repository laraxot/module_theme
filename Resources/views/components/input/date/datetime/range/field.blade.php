@props(['name'])

<div class="datetime_range_picker form-control" id="{{ Str::slug($name) }}" wire:ignore>
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>

    <div style="display:block">
        <input type="hidden" name="date_from" wire:model.lazy="form_data.{{ $name }}_from">
        <input type="hidden" name="date_to" wire:model.lazy="form_data.{{ $name }}_to">
    </div>

</div>

@push('scripts')
    <script>
        $(function() {
            moment.locale('it');

            var start = moment($('#{{ Str::slug($name) }} [name="date_from"]').val());
            if (!start.isValid()) {
                start = moment().subtract(29, 'days').set('hour', 0).set('minute', 0).set('second', 0);
                $('#{{ Str::slug($name) }} [name="date_from"]').val(start.format('yyyy-MM-DDTHH:mm:ss'));
            }
            var end = moment($('#{{ Str::slug($name) }} [name="date_to"]').val());
            if (!end.isValid()) {
                end = moment().set('hour', 23).set('minute', 59).set('second', 59);
                $('#{{ Str::slug($name) }} [name="date_to"]').val(end.format('yyyy-MM-DDTHH:mm:ss'));
            }


            function cb(start, end) {

                console.log(start, end);
                $('#{{ Str::slug($name) }} span').html(start.format('D MMM YYYY HH:mm') + ' - ' + end.format(
                    'D MMM YYYY HH:mm'));
                $('#{{ Str::slug($name) }} [name="date_from"]').val(start.format('yyyy-MM-DDTHH:mm:ss'));
                $('#{{ Str::slug($name) }} [name="date_to"]').val(end.format('yyyy-MM-DDTHH:mm:ss'));
                //@this.emit('setFormDataValueEvent', "{{ $name }}_from", start.format('yyyy-MM-DDTHH:mm:ss'));
                // @this.emit('setFormDataValueEvent', "{{ $name }}_to", end.format('yyyy-MM-DDTHH:mm:ss'));
                // @this.emit('updatedFormDataRowsEvent', @this.form_data);
            }


            var res = $('#{{ Str::slug($name) }}').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);


            cb(start, end);
        });
    </script>
@endpush
