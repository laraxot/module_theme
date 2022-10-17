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
<<<<<<< HEAD
// use Modules\Customer\Models\Customer;
=======
//use Modules\Customer\Models\Customer;
>>>>>>> ede0df7 (first)
use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\Http\Livewire\XotBaseComponent;
use Modules\Xot\Services\PanelService;

/**
 * Modules\Theme\Http\Livewire\FullCalendar\V1.
 */
<<<<<<< HEAD
class Event extends XotBaseComponent {
    // private $model; //Customer::class;
=======
class Event extends XotBaseComponent
{
    //private $model; //Customer::class;
>>>>>>> ede0df7 (first)
    public string $model;
    /**
     * @var string
     */
    public ?string $name = 'Barry';

<<<<<<< HEAD
    public array $events = []; // non sono gli eventi in calendario ma le azioni
=======
    public array $events = []; //non sono gli eventi in calendario ma le azioni
>>>>>>> ede0df7 (first)

    public array $info = [];

    public array $form_data = [];

<<<<<<< HEAD
    public function mount(string $model_class): void {
        // $this->model = app($model_class);
        $this->model = $model_class;
    }

    public function updatedName(): void {
=======
    public function mount(mixed $model_class): void
    {
        //$this->model = app($model_class);
        $this->model = $model_class;
    }

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

<<<<<<< HEAD
    /**
     * @throws \Exception
     */
    public function getEvents(array $info): array {
        $this->info = $info;
        // $name = 'Barry'; // $request->get('name');
=======
    /*
     * @param string|null $info
     *
     * @throws \Exception
     *
     * @return array
     */
    public function getEvents(array $info): array
    {
        $this->info = $info;
        //$name = 'Barry'; // $request->get('name');
>>>>>>> ede0df7 (first)

        $events = app($this->model)->with('post')
            ->whereDate('date_start', '>=', $info['startStr'])
            ->whereDate('date_start', '<=', $info['endStr'])
            ->get()
            ->map(
                function ($model) {
                    return [
<<<<<<< HEAD
                        'id' => $model->id,
                        'title' => $model->title,
                        'description' => '', // $model->note,
                        'start' => $model->date_start->toDateTimeLocalString(),
                        'end' => $model->date_end->toDateTimeLocalString(),
                        // 'start' => '2020-12-09T12:30:00',
=======
                    'id' => $model->id,
                    'title' => $model->title,
                    'description' => '', //$model->note,
                    'start' => $model->date_start->toDateTimeLocalString(),
                    'end' => $model->date_end->toDateTimeLocalString(),
                    //'start' => '2020-12-09T12:30:00',
>>>>>>> ede0df7 (first)
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

    /**
     * @param array $event
     */
<<<<<<< HEAD
    public function eventReceive($event): void {
        $this->events[] = 'eventReceive: '.print_r($event, true);
    }

    public function eventResize(array $event): void {
        // $this->events[] = 'eventResize: '.print_r($event, true);
=======
    public function eventReceive($event): void
    {
        $this->events[] = 'eventReceive: '.print_r($event, true);
    }

    public function eventResize(array $event): void
    {
        //$this->events[] = 'eventResize: '.print_r($event, true);
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function eventDrop($event, $oldEvent): void {
        // $this->events[] = 'eventDrop: '.print_r($oldEvent, true).' -> '.print_r($event, true);
=======
    public function eventDrop($event, $oldEvent): void
    {
        //$this->events[] = 'eventDrop: '.print_r($oldEvent, true).' -> '.print_r($event, true);
>>>>>>> ede0df7 (first)
        session()->flash('message', '['.$event['id'].'] '.$event['title'].' spostato da '.$oldEvent['start'].' a '.$event['start']);
        $row = app($this->model)->find($event['id']);
        $row->date_start = $event['start'];
        $row->date_end = $event['end'];
        $row->save();
    }

    /**
     * Render the component.
     */
<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = $this->getView();
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * @param array $calEvent
     */
<<<<<<< HEAD
    public function edit($calEvent): void {
        $this->form_data = $calEvent['event'];

        // yyyy-MM-ddThh:mm
=======
    public function edit($calEvent): void
    {
        $this->form_data = $calEvent['event'];

        //yyyy-MM-ddThh:mm
>>>>>>> ede0df7 (first)

        $this->form_data['start'] = Carbon::parse($this->form_data['start'])->format('Y-m-d\TH:i');
        if (isset($this->form_data['end'])) {
            $this->form_data['end'] = Carbon::parse($this->form_data['end'])->format('Y-m-d\TH:i');
        } else {
            $this->form_data['end'] = Carbon::parse($this->form_data['start'])->format('Y-m-d\TH:i');
        }
    }

<<<<<<< HEAD
    public function update(): void {
        // dddx(['info' => $this->info, 'events' => $this->events]);
        session()->flash('message', 'Updated Successfully.');

        $row = app($this->model)->find($this->form_data['id']);
        // *
=======
    public function update(): void
    {
        //dddx(['info' => $this->info, 'events' => $this->events]);
        session()->flash('message', 'Updated Successfully.');

        $row = app($this->model)->find($this->form_data['id']);
        //*
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        // */
        $this->resetInputFields();
        // $this->events = $this->getEvents($this->info);
    }

    public function cancel(): void {
        // $this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields(): void {
=======
        //*/
        $this->resetInputFields();
        //$this->events = $this->getEvents($this->info);
    }

    public function cancel(): void
    {
        //$this->updateMode = false;
        $this->resetInputFields();
    }

    private function resetInputFields(): void
    {
>>>>>>> ede0df7 (first)
        $this->form_data = [
            'title' => null,
            'start' => null,
            'end' => null,
        ];
    }
}
