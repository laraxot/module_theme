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
                eventResize: info => @this.eventResize(info.event),
                events: function(info, successCallback, failureCallback) {
                    @this.getEvents(info).then((value) => {
                        successCallback(value);
                    }, reason => {
                        failureCallback(reason);
                    });
                },
                eventClick: function(calEvent, jsEvent, view) {
                    @this.edit(calEvent);
                    $('#editModal').modal();
                },

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

            calendar.render();

            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });

        });

    </script>


    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />


@endpush
