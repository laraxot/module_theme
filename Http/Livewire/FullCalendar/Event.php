<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\FullCalendar;

/*
 * https://laravelplayground.com/#/snippets/8e785494-5a75-4c25-a92d-97ae16e71554
 *
https://github.com/asantibanez/livewire-calendar/blob/master/src/LivewireCalendar.php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\FullCalendar;

/*
 * https://laravelplayground.com/#/snippets/8e785494-5a75-4c25-a92d-97ae16e71554
 *
https://github.com/asantibanez/livewire-calendar/blob/master/src/LivewireCalendar.php
https://www.nicesnippets.com/blog/laravel-livewire-fullcalendar-integration-tutorial
 */

use Carbon\Carbon;
// use Modules\Customer\Models\Customer;
use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\Http\Livewire\XotBaseComponent;
use Modules\Xot\Services\PanelService;

/**
 * Modules\Theme\Http\Livewire\FullCalendar\V1.
 */
class Event extends XotBaseComponent {
    // private $model; //Customer::class;
    public string $model;
    /**
     * @var string
     */
    public ?string $name = 'Barry';

    public array $events = []; // non sono gli eventi in calendario ma le azioni

    public array $info = [];

    public array $form_data = [];

    public function mount(string $model_class): void {
        // $this->model = app($model_class);
        $this->model = $model_class;
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
     */
    public function getEvents(array $info): array {
        $this->info = $info;
        // $name = 'Barry'; // $request->get('name');

        $events = app($this->model)->with('post')
            ->whereDate('date_start', '>=', $info['startStr'])
            ->whereDate('date_start', '<=', $info['endStr'])
            ->get()
            ->map(
                function ($model) {
                    return [
                        'id' => $model->id,
                        'title' => $model->title,
                        'description' => '', // $model->note,
                        'start' => $model->date_start->toDateTimeLocalString(),
                        'end' => $model->date_end->toDateTimeLocalString(),
                        // 'start' => '2020-12-09T12:30:00',
                    ];
                }
            )->all();
        /*
        if (is_array($events)) {
            $this->events = $events;
        }
        */
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

    /**
     * @param array $event
     */
    public function eventReceive($event): void {
        $this->events[] = 'eventReceive: '.print_r($event, true);
    }

    public function eventResize(array $event): void {
        // $this->events[] = 'eventResize: '.print_r($event, true);
        session()->flash('message', '['.$event['id'].'] Aggiornato');
        $row = app($this->model)->find($event['id']);
        $row->date_start = $event['start'];
        $row->date_end = $event['end'];
        $row->save();
    }

    /**
     * @param array $event
     * @param array $oldEvent
     */
    public function eventDrop($event, $oldEvent): void {
        // $this->events[] = 'eventDrop: '.print_r($oldEvent, true).' -> '.print_r($event, true);
        session()->flash('message', '['.$event['id'].'] '.$event['title'].' spostato da '.$oldEvent['start'].' a '.$event['start']);
        $row = app($this->model)->find($event['id']);
        $row->date_start = $event['start'];
        $row->date_end = $event['end'];
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

        // yyyy-MM-ddThh:mm

        $this->form_data['start'] = Carbon::parse($this->form_data['start'])->format('Y-m-d\TH:i');
        if (isset($this->form_data['end'])) {
            $this->form_data['end'] = Carbon::parse($this->form_data['end'])->format('Y-m-d\TH:i');
        } else {
            $this->form_data['end'] = Carbon::parse($this->form_data['start'])->format('Y-m-d\TH:i');
        }
    }

    public function update(): void {
        // dddx(['info' => $this->info, 'events' => $this->events]);
        session()->flash('message', 'Updated Successfully.');

        $row = app($this->model)->find($this->form_data['id']);
        // *
        $data = [
            'date_start' => $this->form_data['start'],
            'date_end' => $this->form_data['end'],
        ];
        $data_post = [
            'title' => $this->form_data['title'],
        ];
        /*
        PanelService::make()->get($row)->update($data);
        */
        $row->post->update($data_post);
        $row->update($data);
        // */
        $this->resetInputFields();
        // $this->events = $this->getEvents($this->info);
    }

    public function cancel(): void {
        // $this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields(): void {
        $this->form_data = [
            'title' => null,
            'start' => null,
            'end' => null,
        ];
    }
}
