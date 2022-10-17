<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

/*
 * https://laravelplayground.com/#/snippets/8e785494-5a75-4c25-a92d-97ae16e71554

 */

use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;

/**
 * Class FullCalendar.
 */
<<<<<<< HEAD
class FullCalendar extends Component {
=======
class FullCalendar extends Component
{
>>>>>>> ede0df7 (first)
    /**
     * @var string
     */
    public ?string $name = 'Barry';

<<<<<<< HEAD
    public array $events = []; // non sono gli eventi in calendario ma le azioni

    public array $form_data = [];

    public function mount(): void {
=======
    public array $events = []; //non sono gli eventi in calendario ma le azioni

    public array $form_data = [];

    public function mount(): void
    {
>>>>>>> ede0df7 (first)
        /*$name = 'Barry';
        $events = [];
        foreach (range(0, 6) as $i) {
            $events[] = [
                'id' => uniqid(),
                'title' => Str::random(4).$name,
                'start' => now()->addDay(random_int(-10, 10))->toDateString(),
            ];
        }
        $this->events = $events;
        */
    }

<<<<<<< HEAD
    public function updatedName(): void {
=======
    public function updatedName(): void
    {
>>>>>>> ede0df7 (first)
        $this->emit('refreshCalendar');
    }

    /**
     * @return string[]
     */
<<<<<<< HEAD
    public function getNamesProperty() {
=======
    public function getNamesProperty()
    {
>>>>>>> ede0df7 (first)
        return [
            'Barry',
            'Taylor',
            'Caleb',
        ];
    }

    /**
     * @throws \Exception
     *
     * @return array
     */
<<<<<<< HEAD
    public function getEvents() {
        // dddx('preso');
=======
    public function getEvents()
    {
        //dddx('preso');
>>>>>>> ede0df7 (first)
        $name = 'Barry'; // $request->get('name');

        $events = [];
        foreach (range(0, 6) as $i) {
            $events[] = [
                'id' => uniqid(),
                'title' => Str::random(4).$name,
                'start' => now()->addDays(random_int(-10, 10))->toDateString(),
            ];
        }
<<<<<<< HEAD
        // $this->events = $events;
=======
        //$this->events = $events;
>>>>>>> ede0df7 (first)
        return $events;
    }

    /**
     * @return array|string[]
     */
<<<<<<< HEAD
    public function getTasksProperty() {
        switch ($this->name) {
            case 'Barry':
                return ['Debugbar', 'IDE Helper'];
            case 'Taylor':
                return ['Laravel', 'Jetstream'];
            case 'Caleb':
                return ['Livewire', 'Sushi'];
=======
    public function getTasksProperty()
    {
        switch ($this->name) {
        case 'Barry':
            return ['Debugbar', 'IDE Helper'];
        case 'Taylor':
            return ['Laravel', 'Jetstream'];
        case 'Caleb':
            return ['Livewire', 'Sushi'];
>>>>>>> ede0df7 (first)
        }

        return [];
    }

<<<<<<< HEAD
    public function eventReceive(array $event): void {
        $this->events[] = 'eventReceive: '.print_r($event, true);
    }

    public function eventDrop(array $event, array $oldEvent): void {
=======
    public function eventReceive(array $event): void
    {
        $this->events[] = 'eventReceive: '.print_r($event, true);
    }

    public function eventDrop(array $event, array $oldEvent): void
    {
>>>>>>> ede0df7 (first)
        $this->events[] = 'eventDrop: '.print_r($oldEvent, true).' -> '.print_r($event, true);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
<<<<<<< HEAD
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        return view()->make('theme::livewire.full_calendar');
    }

    public function edit(array $calEvent): void {
=======
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        return view()->make('theme::livewire.full_calendar');
    }

    public function edit(array $calEvent): void
    {
>>>>>>> ede0df7 (first)
        /*dddx($calEvent['event']);
         array:4 [▼
        "title" => "IDE Helper"
        "start" => "2021-06-08T08:30:00+02:00"
        "end" => "2021-06-08T11:30:00+02:00"
        "id" => "60bf2b8e12802"
        ]
        */
        $this->form_data = $calEvent['event'];
<<<<<<< HEAD
        // yyyy-MM-ddThh:mm
        // $this->form_data['start'] = Carbon::parse($this->form_data['start'])->format('Y-m-d\TH:i');
        // $this->form_data['end'] = Carbon::parse($this->form_data['end'])->format('Y-m-d\TH:i');
    }

    public function update(): void {
=======
        //yyyy-MM-ddThh:mm
        //$this->form_data['start'] = Carbon::parse($this->form_data['start'])->format('Y-m-d\TH:i');
        //$this->form_data['end'] = Carbon::parse($this->form_data['end'])->format('Y-m-d\TH:i');
    }

    public function update(): void
    {
>>>>>>> ede0df7 (first)
        session()->flash('message', 'Updated Successfully.');
        $this->resetInputFields();
    }

<<<<<<< HEAD
    public function cancel(): void {
        // $this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields(): void {
=======
    public function cancel(): void
    {
        //$this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields(): void
    {
>>>>>>> ede0df7 (first)
        $this->form_data = [];
    }
}
