<div id='external-events'>
    <p>
        <strong>Draggable Events</strong>
    </p>

    <select wire:model="name" id="selectName">
        <option value="">Choose user</option>
        @foreach ($this->names as $name)
            <option value="{{ $name }}">{{ $name }}</option>
        @endforeach
    </select>

    @foreach ($this->tasks as $task)
        <div data-event='@json([' id'=> uniqid(), 'title' => $task])' class='fc-event fc-h-event
            fc-daygrid-event fc-daygrid-block-event'>
            <div class='fc-event-main'>{{ $task }}</div>
        </div>
    @endforeach

    <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
    </p>

    <ul>{{-- non sono gli eventi del calendario ma lo stack delle azioni
        
        @foreach (array_reverse($events) as $event)
            <li>{{ $event }}</li>
        @endforeach --}}
    </ul>
</div>
