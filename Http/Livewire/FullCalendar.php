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
class FullCalendar extends Component {
    /**
     * @var string
     */
    public ?string $name = 'Barry';

    public array $events = []; // non sono gli eventi in calendario ma le azioni

    public array $form_data = [];

    public function mount(): void {
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

    public function updatedName(): void {
        $this->emit('refreshCalendar');
    }

    /**
     * @return string[]
     */
    public function getNamesProperty() {
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
    public function getEvents() {
        // dddx('preso');
        $name = 'Barry'; // $request->get('name');

        $events = [];
        foreach (range(0, 6) as $i) {
            $events[] = [
                'id' => uniqid(),
                'title' => Str::random(4).$name,
                'start' => now()->addDays(random_int(-10, 10))->toDateString(),
            ];
        }
        // $this->events = $events;
        return $events;
    }

    /**
     * @return array|string[]
     */
    public function getTasksProperty() {
        switch ($this->name) {
            case 'Barry':
                return ['Debugbar', 'IDE Helper'];
            case 'Taylor':
                return ['Laravel', 'Jetstream'];
            case 'Caleb':
                return ['Livewire', 'Sushi'];
        }

        return [];
    }

    public function eventReceive(array $event): void {
        $this->events[] = 'eventReceive: '.print_r($event, true);
    }

    public function eventDrop(array $event, array $oldEvent): void {
        $this->events[] = 'eventDrop: '.print_r($oldEvent, true).' -> '.print_r($event, true);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        return view()->make('theme::livewire.full_calendar');
    }

    public function edit(array $calEvent): void {
        /*dddx($calEvent['event']);
         array:4 [▼
        "title" => "IDE Helper"
        "start" => "2021-06-08T08:30:00+02:00"
        "end" => "2021-06-08T11:30:00+02:00"
        "id" => "60bf2b8e12802"
        ]
        */
        $this->form_data = $calEvent['event'];
        // yyyy-MM-ddThh:mm
        // $this->form_data['start'] = Carbon::parse($this->form_data['start'])->format('Y-m-d\TH:i');
        // $this->form_data['end'] = Carbon::parse($this->form_data['end'])->format('Y-m-d\TH:i');
    }

    public function update(): void {
        session()->flash('message', 'Updated Successfully.');
        $this->resetInputFields();
    }

    public function cancel(): void {
        // $this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields(): void {
        $this->form_data = [];
    }
}
