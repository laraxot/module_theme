<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\FullCalendar;

/*
 * https://laravelplayground.com/#/snippets/8e785494-5a75-4c25-a92d-97ae16e71554

 */

use Illuminate\Contracts\Support\Renderable;
// use Modules\Customer\Models\Customer;
use Illuminate\Support\Str;
use Modules\Theme\Contracts\ModelLangContract;
use Modules\Xot\Http\Livewire\XotBaseComponent;

/**
 * Modules\Theme\Http\Livewire\FullCalendar\V1.
 */
class V1 extends XotBaseComponent {
    private string $model = '?';

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

    public function getNamesProperty(): array {
        return [
            'Barry',
            'Taylor',
            'Caleb',
        ];
    }

    /**
     * @param string|null $info
     *
     * @throws \Exception
     *
     * @return array
     */
    public function getEvents($info) {
        // dddx($info);
        /*
        "start" => "2020-11-28T23:00:00.000Z"
        "end" => "2021-01-09T23:00:00.000Z"
        "startStr" => "2020-11-29T00:00:00+01:00"
        "endStr" => "2021-01-10T00:00:00+01:00"
        "timeZone" => "local"
        */
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

        /*
        $events = app($this->model)->query()
            ->whereDate('date_next_check', '>=', $info['startStr'])
            ->whereDate('date_next_check', '<=', $info['endStr'])
            ->get()
            ->map(function (ModelLangContract $model) {
                return [
                    'id' => $model->id,
                    'title' => $model->title,
                    'description' => '', //$model->note,
                    'start' => $model->date_next_check,
                    //'start' => '2020-12-09T12:30:00',
                ];
            })->all();
        */
        // dddx(['events' => $events]);

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
        // $this->events[] = 'eventDrop: '.print_r($oldEvent, true).' -> '.print_r($event, true);
        session()->flash('message', '['.$event['id'].'] '.$event['title'].' spostato da '.$oldEvent['start'].' a '.$event['start']);
        $row = app($this->model)->find($event['id']);
        $row->date_next_check = $event['start'];
        $row->save();
    }

    /**
     * Render the component.
     */
    public function render(): Renderable {
        $view = $this->getView();
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * @param array $calEvent
     */
    public function edit($calEvent): void {
        $this->form_data = $calEvent['event'];
    }

    public function update(): void {
        session()->flash('message', 'Users Updated Successfully.');
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
