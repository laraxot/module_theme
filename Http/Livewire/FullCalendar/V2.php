<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\FullCalendar;

/*
 * https://github.com/asantibanez/livewire-calendar/blob/master/src/LivewireCalendar.php
 */

use Carbon\Carbon;
use Illuminate\Support\Collection;
<<<<<<< HEAD
// use Modules\Customer\Models\Customer;
=======
//use Modules\Customer\Models\Customer;
>>>>>>> ede0df7 (first)
use Illuminate\Support\Str;
use Modules\Theme\Contracts\ModelLangContract;

/**
 * Modules\Theme\Http\Livewire\FullCalendar\V2.
 *
 * @property Carbon                 $startsAt
 * @property Carbon                 $endsAt
 * @property Carbon                 $gridStartsAt
 * @property Carbon                 $gridEndsAt
 * @property int                    $weekStartsAt
 * @property int                    $weekEndsAt
 * @property string                 $calendarView
 * @property string                 $dayView
 * @property string                 $eventView
 * @property string                 $dayOfWeekView
 * @property string                 $beforeCalendarWeekView
 * @property string                 $afterCalendarWeekView
 * @property string                 $dragAndDropClasses
 * @property int                    $pollMillis
 * @property string                 $pollAction
 * @property bool                   $dragAndDropEnabled
 * @property bool                   $dayClickEnabled
 * @property bool                   $eventClickEnabled
 * @property ModelLangContract|null $model
 * @property XotBasePanel           $panel
 */
<<<<<<< HEAD
class V2 extends BaseV2 {
=======
class V2 extends BaseV2
{
>>>>>>> ede0df7 (first)
    private string $model = ''; // = Customer::class;

    public array $events;

<<<<<<< HEAD
    public function events(): Collection {
=======
    public function events(): Collection
    {
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

        /*
        $events= app($this->model)->query()
        ->whereDate('date_next_check', '>=', $this->gridStartsAt)
        ->whereDate('date_next_check', '<=', $this->gridEndsAt)
        ->get()
        ->map(function (ModelLangContract $model) {
            return [
                'id' => $model->id,
                'title' => $model->title,
                'description' => '', //$model->note,
                'date' => $model->date_next_check,
            ];
        });
        */

        return collect($events);
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     */
<<<<<<< HEAD
    public function onDayClick($year, $month, $day): void {
=======
    public function onDayClick($year, $month, $day): void
    {
>>>>>>> ede0df7 (first)
    }

    /**
     * @param int $eventId
     */
<<<<<<< HEAD
    public function onEventClick($eventId): void {
=======
    public function onEventClick($eventId): void
    {
>>>>>>> ede0df7 (first)
    }

    /**
     * @param int $eventId
     * @param int $year
     * @param int $month
     * @param int $day
     */
<<<<<<< HEAD
    public function onEventDropped($eventId, $year, $month, $day): void {
=======
    public function onEventDropped($eventId, $year, $month, $day): void
    {
>>>>>>> ede0df7 (first)
        $row = app($this->model)->find($eventId);
        $row->date_next_check = $year.'-'.$month.'-'.$day;
        $row->save();
    }
}
