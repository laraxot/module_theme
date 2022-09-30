<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
{{--<div class="form-check">
    <input class="form-check-input" type="checkbox" value="" id="time_slot" name="time_slot">
    <label class="form-check-label" for="time_slot">
        Fascia Oraria
    </label>
</div>--}}

<input type="hidden" id="date_from" name="date_from">
<input type="hidden" id="date_to" name="date_to">

@push('scripts')
    <script>
        let drp = null;

        moment.locale('it')

        function cb(start, end) {
            $('#date_from').val(start.format('yyyy-MM-DDTHH:mm:ss'))
            $('#date_to').val(end.format('yyyy-MM-DDTHH:mm:ss'))

            $('#reportrange span').html(start.format('yyyy-MM-DD HH:mm:ss') + ' - ' + end.format('yyyy-MM-DD HH:mm:ss') +
                ' <input id="reportrange_checkbox" type="checkbox" onclick="event.stopPropagation();setTime()">');
        }

        var start = moment().subtract(29, 'days').set("hour", '00').set("minute", '00').set("seconds", '00');
        var end = moment().set("hour", '23').set("minute", '59').set("seconds", '59');

        drp = $('#reportrange').daterangepicker({
            timePicker: false,
            timePicker24Hour: true,
            locale: {
                format: 'yyyy-MM-DDTHH:mm:ss'
            },
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



        function setTime() {

            if ($('#reportrange_checkbox').prop('checked') === true) {
                drp.daterangepicker({
                    timePicker: true,
                    timePicker24Hour: true,
                    locale: {
                        format: 'yyyy-MM-DDTHH:mm:ss'
                    },
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                            'month').endOf('month')]
                    }
                }, cb)
            } else {
                drp.daterangepicker({
                    timePicker: false,
                    timePicker24Hour: true,
                    locale: {
                        format: 'yyyy-MM-DDTHH:mm:ss'
                    },
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
            }

        }
    </script>
@endpush
