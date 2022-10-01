<div id="reportrange_{{$name}}" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
<input type="hidden" id="date_from_{{$name}}" name="date_from_{{$name}}" wire:model.lazy="form_data.date_from_{{$name}}">
<input type="hidden" id="date_to_{{$name}}" name="date_to_{{$name}}" wire:model.lazy="form_data.date_to_{{$name}}">

@push('scripts')
    <script>
        $(function() {

            moment.locale('it')

            this.cb = function(start, end)  {
                $('#date_from_{{$name}}').val(start.format('yyyy-MM-DDTHH:mm:ss'))
                $('#date_to_{{$name}}').val(end.format('yyyy-MM-DDTHH:mm:ss'))

                $('#reportrange_{{$name}} span').html(start.format('yyyy-MM-DD HH:mm:ss') + ' - ' + end.format(
                        'yyyy-MM-DD HH:mm:ss') +
                    ' <input id="reportrange_checkbox_{{$name}}" type="checkbox" onclick="event.stopPropagation();setTime()">'
                    );
            }

            this.start = moment().subtract(29, 'days').set("hour", '00').set("minute", '00').set("seconds", '00');
            this.end = moment().set("hour", '23').set("minute", '59').set("seconds", '59');

            this.drp = $('#reportrange_{{$name}}').daterangepicker({
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
            }, this.cb);

            this.cb(this.start, this.end);



            this.setTime = function() {

                if ($('#reportrange_checkbox_{{$name}}').prop('checked') === true) {
                    this.drp.daterangepicker({
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
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                                .subtract(1,
                                    'month').endOf('month')
                            ]
                        }
                    }, this.cb)
                } else {
                    this.drp.daterangepicker({
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
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment()
                                .subtract(1,
                                    'month').endOf('month')
                            ]
                        }
                    }, this.cb);
                }

            }
        })
    </script>
@endpush
