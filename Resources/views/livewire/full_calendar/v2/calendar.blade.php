<div

    @if($pollMillis !== null && $pollAction !== null)
        wire:poll.{{ $pollMillis }}ms="{{ $pollAction }}"
    @elseif($pollMillis !== null)
        wire:poll.{{ $pollMillis }}ms
    @endif
>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@1.x.x/dist/tailwind.min.css" rel="stylesheet" />
    <div>
        @includeIf($beforeCalendarView)
    </div>

    <div class="flex">
        <div class="overflow-x-auto w-full">
            <div class="inline-block min-w-full overflow-hidden">

                <div class="w-full flex flex-row">
                    @foreach($monthGrid->first() as $day)
                        @include($dayOfWeekView, ['day' => $day])
                    @endforeach
                </div>

                @foreach($monthGrid as $week)
                    <div class="w-full flex flex-row">
                        @foreach($week as $day)
                            @include($dayView, [
                                    'componentId' => $componentId,
                                    'day' => $day,
                                    'dayInMonth' => $day->isSameMonth($startsAt),
                                    'isToday' => $day->isToday(),
                                    'events' => $getEventsForDay($day, $events),
                                ])
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div>
        @includeIf($afterCalendarView)
    </div>
</div>

@push('scripts')
<script>
    function onLivewireCalendarEventDragStart(event, eventId) {
        event.dataTransfer.setData('id', eventId);
    }

    function onLivewireCalendarEventDragEnter(event, componentId, dateString, dragAndDropClasses) {
        event.stopPropagation();
        event.preventDefault();

        let element = document.getElementById(`${componentId}-${dateString}`);
        element.className = element.className + ` ${dragAndDropClasses} `;
    }

    function onLivewireCalendarEventDragLeave(event, componentId, dateString, dragAndDropClasses) {
        event.stopPropagation();
        event.preventDefault();

        let element = document.getElementById(`${componentId}-${dateString}`);
        element.className = element.className.replace(dragAndDropClasses, '');
    }

    function onLivewireCalendarEventDragOver(event) {
        event.stopPropagation();
        event.preventDefault();
    }

    function onLivewireCalendarEventDrop(event, componentId, dateString, year, month, day, dragAndDropClasses) {
        event.stopPropagation();
        event.preventDefault();

        let element = document.getElementById(`${componentId}-${dateString}`);
        element.className = element.className.replace(dragAndDropClasses, '');

        const eventId = event.dataTransfer.getData('id');

        window.Livewire.find(componentId).call('onEventDropped', eventId, year, month, day);
    }
</script>
@endpush
