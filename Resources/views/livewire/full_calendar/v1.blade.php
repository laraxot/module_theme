<div>
    <div class="row">

        @if (session()->has('message'))
            <div class="col-md-12">
                <div class="alert alert-success" style="margin-top:30px;">x
                    {{ session('message') }}
                </div>
            </div>
        @endif

        @include($view.'.modal')
        <div class="col-md-2">
            @include($view.'.external_events')
        </div>

        <div id='calendar-container' wire:ignore class="col-md-10">
            <div id='calendar'></div>
        </div>
    </div>
</div>

@push('scripts')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

    <script>
        document.addEventListener('livewire:load', function() {
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var containerEl = document.getElementById('external-events');
            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');

            // initialize the external events
            // -----------------------------------------------------------------

            new Draggable(containerEl, {
                itemSelector: '.fc-event'
            });

            // initialize the calendar
            // -----------------------------------------------------------------

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                },
                eventReceive: info => @this.eventReceive(info.event),
                eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
                events: function(info, successCallback, failureCallback) {
                    //https://fullcalendar.io/docs/events-function
                    /*
                    console.log(info);
                    console.log(successCallback);
                    console.log(failureCallback);
                    */
                    /*
                    var events = [ // put the array in the `events` property
                        {
                            title: 'event1',
                            start: '2020-12-01'
                        },
                        {
                            title: 'event2',
                            start: '2020-12-05',
                            end: '2020-12-07'
                        },
                        {
                            title: 'event3',
                            start: '2020-12-09T12:30:00',
                        }
                    ];
                    */
                    @this.getEvents(info).then((value) => {
                        successCallback(value);
                    }, reason => {
                        failureCallback(reason);
                    });
                    //

                },
                eventClick: function(calEvent, jsEvent, view) {
                    /*
                    console.log('calEvent');
                    console.log(calEvent);
                    console.log(calEvent.start);
                    console.log('jsEvent');
                    console.log(jsEvent);
                    console.log('jsEvent');
                    console.log(jsEvent);
                    for(i in calEvent){
                        console.log('-----');
                        console.log(i);
                        console.log(calEvent[i]);
                    }
                    //*/
                    @this.edit(calEvent);
                    /*
                    console.log('++++++++++++');
                    console.log(calEvent.start);
                    $('#start_time').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#finish_time').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm:ss'));

                    */
                    $('#editModal').modal();
                },
                /* https://fullcalendar.io/docs/v4/eventRender
                eventRender: function(event, element, view) {
                 if (view.name == 'agendaDay') {
                      element.find('span.fc-event-title').html(element.find('span.fc-event-title').text()+'!!');
                 }
                },
                */
                /*eventSources:[
                    loadEvents
                ],
                */
                /*
                        eventSources: [

                    // your event source
                    {
                      events: [ // put the array in the `events` property
                        {
                          title  : 'event1',
                          start  : '2010-01-01'
                        },
                        {
                          title  : 'event2',
                          start  : '2010-01-05',
                          end    : '2010-01-07'
                        },
                        {
                          title  : 'event3',
                          start  : '2010-01-09T12:30:00',
                        }
                      ],
                      color: 'black',     // an option!
                      textColor: 'yellow' // an option!
                    }

                    // any other event sources...

                  ],
                  */
                loading: function(isLoading) {
                    if (!isLoading) {
                        // Reset custom events
                        this.getEvents().forEach(function(e) {

                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                }
            });
            /*
            calendar.addEventSource({
                url: '/api/calendar/events',
                extraParams: function() {
                    return {
                        name: @this.name,
                        test: 'TEST'
                    };
                }
            });
            //*/

            /*
            calendar.addEventSource(
                @this.getEvents()
                [
                    {
                    title  : 'event1',
                    start  : '2020-12-01'
                    },
                    {
                    title  : 'event2',
                    start  : '2020-12-05',
                    end    : '2020-12-07'
                    },
                    {
                    title  : 'event3',
                    start  : '2020-12-09T12:30:00',
                    }
                ]

            );
            */

            calendar.render();

            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });
            /*
            function loadEvents (start, end, timezone, callback) {
                console.log(calendar);
                //console.log(this.events);
                //console.log(start);
                //console.log(start.startStr+' '+start.endStr+' '+start.timeZone);

                //startStr  endStr timeZone
                //console.log(end);
                //console.log(timezone);
                //console.log(callback);
                //callback();
                var events= [
                    {
                        title: 'All Day Event',
                        start: '2020-12-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2020-12-07',
                        end: '2020-12-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2020-12-09T16:00:00'
                    }
                ];
            }
            */

        });

    </script>


    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />

    <style>
        /*
                                                                            html, body {
                                                                                margin: 0;
                                                                                padding: 0;
                                                                                font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
                                                                                font-size: 14px;
                                                                            }

                                                                            #external-events {
                                                                                position: fixed;
                                                                                z-index: 2;
                                                                                top: 20px;
                                                                                left: 20px;
                                                                                width: 150px;
                                                                                padding: 0 10px;
                                                                                border: 1px solid #ccc;
                                                                                background: #eee;
                                                                            }
                                                                            */
        /*
                                                                            .demo-topbar + #external-events {
                                                                                top: 60px;
                                                                            }

                                                                            #external-events .fc-event {
                                                                                cursor: move;
                                                                                margin: 3px 0;
                                                                            }

                                                                            #calendar-container {
                                                                                position: relative;
                                                                                z-index: 1;
                                                                                margin-left: 200px;
                                                                            }

                                                                            #calendar {
                                                                                max-width: 1100px;
                                                                                margin: 20px auto;
                                                                            }
                                                                            */

    </style>
@endpush
