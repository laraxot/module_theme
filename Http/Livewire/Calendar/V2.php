<?php

/**
 * https://github.com/asantibanez/livewire-calendar/blob/master/src/LivewireCalendar.php.
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Calendar;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Xot\Services\PanelService;

/**
 * Class LivewireCalendar.
 *
 * @property Carbon $startsAt
 * @property Carbon $endsAt
 * @property Carbon $gridStartsAt
 * @property Carbon $gridEndsAt
 * @property int    $weekStartsAt
 * @property int    $weekEndsAt
 * @property string $calendarView
 * @property string $dayView
 * @property string $eventView
 * @property string $dayOfWeekView
 * @property string $beforeCalendarWeekView
 * @property string $afterCalendarWeekView
 * @property string $dragAndDropClasses
 * @property int    $pollMillis
 * @property string $pollAction
 * @property bool   $dragAndDropEnabled
 * @property bool   $dayClickEnabled
 * @property bool   $eventClickEnabled
 */
<<<<<<< HEAD
class V2 extends Component {
=======
class V2 extends Component
{
>>>>>>> ede0df7 (first)
    public Carbon $startsAt;
    public Carbon $endsAt;

    public Carbon $gridStartsAt;
    public Carbon $gridEndsAt;

    public int $weekStartsAt;
    public mixed $weekEndsAt;

    public string $calendarView;
    public string $dayView;
    public string $eventView;
    public string $dayOfWeekView;

    public string $dragAndDropClasses;

<<<<<<< HEAD
    public ?string $beforeCalendarView;
    public ?string $afterCalendarView;
=======
    public string $beforeCalendarView;
    public string $afterCalendarView;
>>>>>>> ede0df7 (first)

    public int $pollMillis;
    public string $pollAction;

    public bool $dragAndDropEnabled;
    public bool $dayClickEnabled;
    public bool $eventClickEnabled;

    public array $form_data = [];

    public string $model;

    public string $form_edit;

    public int $event_id;

    protected array $casts = [
        'startsAt' => 'date',
        'endsAt' => 'date',
        'gridStartsAt' => 'date',
        'gridEndsAt' => 'date',
    ];

    /**
<<<<<<< HEAD
     * Undocumented function.
     */
    public function mount(
        int $initialYear = null,
        int $initialMonth = null,
        int $weekStartsAt = null,
        string $calendarView = null,
        string $dayView = null,
        string $eventView = null,
        string $dayOfWeekView = null,
        string $dragAndDropClasses = null,
        string $beforeCalendarView = null,
        string $afterCalendarView = null,
        string $pollMillis = null,
        string $pollAction = null,
        bool $dragAndDropEnabled = true,
        bool $dayClickEnabled = true,
        bool $eventClickEnabled = true,
        array $extras = []
    ): void {
        $this->weekStartsAt = $weekStartsAt ?? Carbon::SUNDAY;
        $this->weekEndsAt = Carbon::SUNDAY === $this->weekStartsAt
=======
     * @param int       $initialYear
     * @param int       $initialMonth
     * @param int|mixed $weekStartsAt
     * @param mixed     $calendarView
     * @param mixed     $dayView
     * @param mixed     $eventView
     * @param mixed     $dayOfWeekView
     * @param mixed     $dragAndDropClasses
     * @param mixed     $beforeCalendarView
     * @param mixed     $afterCalendarView
     * @param mixed     $pollMillis
     * @param mixed     $pollAction
     * @param mixed     $dragAndDropEnabled
     * @param mixed     $dayClickEnabled
     * @param mixed     $eventClickEnabled
     * @param mixed     $eventClickEnabled
     * @param array     $extras
     */
    public function mount($initialYear = null,
        $initialMonth = null,
        $weekStartsAt = null,
        $calendarView = null,
        $dayView = null,
        $eventView = null,
        $dayOfWeekView = null,
        $dragAndDropClasses = null,
        $beforeCalendarView = null,
        $afterCalendarView = null,
        $pollMillis = null,
        $pollAction = null,
        $dragAndDropEnabled = true,
        $dayClickEnabled = true,
        $eventClickEnabled = true,
        $extras = []
    ): void {
        $this->weekStartsAt = $weekStartsAt ?? Carbon::SUNDAY;
        $this->weekEndsAt = Carbon::SUNDAY == $this->weekStartsAt
>>>>>>> ede0df7 (first)
            ? Carbon::SATURDAY
            : collect([0, 1, 2, 3, 4, 5, 6])->get($this->weekStartsAt + 6 - 7);

        $initialYear = $initialYear ?? Carbon::today()->year;
        $initialMonth = $initialMonth ?? Carbon::today()->month;

        $this->startsAt = Carbon::createFromDate($initialYear, $initialMonth, 1)->startOfDay();
        $this->endsAt = $this->startsAt->clone()->endOfMonth()->startOfDay();

        $this->calculateGridStartsEnds();

        $this->setupViews($calendarView, $dayView, $eventView, $dayOfWeekView, $beforeCalendarView, $afterCalendarView);

        $this->setupPoll($pollMillis, $pollAction);

        $this->dragAndDropEnabled = $dragAndDropEnabled;
        $this->dragAndDropClasses = $dragAndDropClasses ?? 'border border-blue-400 border-4';

        $this->dayClickEnabled = $dayClickEnabled;
        $this->eventClickEnabled = $eventClickEnabled;

        $this->afterMount($extras);

        $this->model = 'Modules\Blog\Models\Event';
<<<<<<< HEAD
        // $this->fields = PanelService::make()->get(app($this->model))->fields();
        // dddx($this->fields);
=======
        //$this->fields = PanelService::make()->get(app($this->model))->fields();
        //dddx($this->fields);
>>>>>>> ede0df7 (first)
        $panel = PanelService::make()->get(app($this->model));
        $this->form_edit = $panel->formLivewireEdit();
    }

    /**
     * @param array $extras
     */
<<<<<<< HEAD
    public function afterMount($extras = []): void {
    }

    /**
     * -----.
     */
    public function setupViews(
        string $calendarView = null,
        string $dayView = null,
        string $eventView = null,
        string $dayOfWeekView = null,
        string $beforeCalendarView = null,
        string $afterCalendarView = null
=======
    public function afterMount($extras = []): void
    {
    }

    /**
     * @param mixed $calendarView
     * @param mixed $dayView
     * @param mixed $eventView
     * @param mixed $dayOfWeekView
     * @param mixed $beforeCalendarView
     * @param mixed $afterCalendarView
     */
    public function setupViews($calendarView = null,
        $dayView = null,
        $eventView = null,
        $dayOfWeekView = null,
        $beforeCalendarView = null,
        $afterCalendarView = null
>>>>>>> ede0df7 (first)
    ): void {
        $this->calendarView = $calendarView ?? 'theme::livewire.calendar.v2.calendar';
        $this->dayView = $dayView ?? 'theme::livewire.calendar.v2.day';
        $this->eventView = $eventView ?? 'theme::livewire.calendar.v2.event';
        $this->dayOfWeekView = $dayOfWeekView ?? 'theme::livewire.calendar.v2.day-of-week';

        $this->beforeCalendarView = $beforeCalendarView ?? null;
        $this->afterCalendarView = $afterCalendarView ?? null;
    }

    /**
     * @param mixed $pollMillis
     * @param mixed $pollAction
     */
<<<<<<< HEAD
    public function setupPoll($pollMillis, $pollAction): void {
=======
    public function setupPoll($pollMillis, $pollAction): void
    {
>>>>>>> ede0df7 (first)
        $this->pollMillis = $pollMillis;
        $this->pollAction = $pollAction;
    }

<<<<<<< HEAD
    public function goToPreviousMonth(): void {
=======
    public function goToPreviousMonth(): void
    {
>>>>>>> ede0df7 (first)
        $this->startsAt->subMonthNoOverflow();
        $this->endsAt->subMonthNoOverflow();

        $this->calculateGridStartsEnds();
    }

<<<<<<< HEAD
    public function goToNextMonth(): void {
=======
    public function goToNextMonth(): void
    {
>>>>>>> ede0df7 (first)
        $this->startsAt->addMonthNoOverflow();
        $this->endsAt->addMonthNoOverflow();

        $this->calculateGridStartsEnds();
    }

<<<<<<< HEAD
    public function goToCurrentMonth(): void {
=======
    public function goToCurrentMonth(): void
    {
>>>>>>> ede0df7 (first)
        $this->startsAt = Carbon::today()->startOfMonth()->startOfDay();
        $this->endsAt = $this->startsAt->clone()->endOfMonth()->startOfDay();

        $this->calculateGridStartsEnds();
    }

<<<<<<< HEAD
    public function calculateGridStartsEnds(): void {
=======
    public function calculateGridStartsEnds(): void
    {
>>>>>>> ede0df7 (first)
        $this->gridStartsAt = $this->startsAt->clone()->startOfWeek($this->weekStartsAt);
        $this->gridEndsAt = $this->endsAt->clone()->endOfWeek($this->weekEndsAt);
    }

<<<<<<< HEAD
    public function monthGrid(): Collection {
=======
    public function monthGrid(): Collection
    {
>>>>>>> ede0df7 (first)
        $firstDayOfGrid = $this->gridStartsAt;
        $lastDayOfGrid = $this->gridEndsAt;

        $numbersOfWeeks = $lastDayOfGrid->diffInWeeks($firstDayOfGrid) + 1;
        $days = $lastDayOfGrid->diffInDays($firstDayOfGrid) + 1;

<<<<<<< HEAD
        if (0 !== $days % 7) {
            throw new Exception('Livewire Calendar not correctly configured. Check initial inputs.');
        }

        /**
         * @var Collection
         */
        $monthGrid = collect([]);
=======
        if (0 != $days % 7) {
            throw new Exception('Livewire Calendar not correctly configured. Check initial inputs.');
        }

        $monthGrid = collect();
>>>>>>> ede0df7 (first)
        $currentDay = $firstDayOfGrid->clone();

        while (! $currentDay->greaterThan($lastDayOfGrid)) {
            $monthGrid->push($currentDay->clone());
            $currentDay->addDay();
        }

        $monthGrid = $monthGrid->chunk(7);
<<<<<<< HEAD
        if ($numbersOfWeeks !== $monthGrid->count()) {
=======
        if ($numbersOfWeeks != $monthGrid->count()) {
>>>>>>> ede0df7 (first)
            throw new Exception('Livewire Calendar calculated wrong number of weeks. Sorry :(');
        }

        return $monthGrid;
    }

<<<<<<< HEAD
    public function events(): Collection {
=======
    public function events(): Collection
    {
>>>>>>> ede0df7 (first)
        $this->model = 'Modules\Blog\Models\Event';
        $events = app($this->model)->with('post')
            ->whereDate('date_start', '>=', $this->gridStartsAt)
            ->whereDate('date_start', '<=', $this->gridEndsAt)
            ->get()
            ->map(
                function ($model) {
                    return [
<<<<<<< HEAD
                        'id' => $model->id,
                        'title' => $model->title,
                        'description' => '', // $model->note,
                        'date' => $model->date_start->toDateTimeLocalString(),
                        'start' => $model->date_start->toDateTimeLocalString(),
                        'end' => $model->date_end->toDateTimeLocalString(),
                        // 'start' => '2020-12-09T12:30:00',
                    ];
                }
            ); // ->all();

        return $events;

        // return collect();
    }

    public function getEventsForDay(mixed $day, Collection $events): Collection {
=======
                    'id' => $model->id,
                    'title' => $model->title,
                    'description' => '', //$model->note,
                    'date' => $model->date_start->toDateTimeLocalString(),
                    'start' => $model->date_start->toDateTimeLocalString(),
                    'end' => $model->date_end->toDateTimeLocalString(),
                    //'start' => '2020-12-09T12:30:00',
                    ];
                }
            ); //->all();

        return $events;

        //return collect();
    }

    public function getEventsForDay(mixed $day, Collection $events): Collection
    {
>>>>>>> ede0df7 (first)
        return $events
            ->filter(
                function ($event) use ($day) {
                    return Carbon::parse($event['date'])->isSameDay($day);
                }
            );
    }

    /*public function onDayClick($year, $month, $day): void {
    }*/

<<<<<<< HEAD
    public function onEventClick(int $eventId): void {
=======
    public function onEventClick(int $eventId): void
    {
>>>>>>> ede0df7 (first)
        $this->event_id = $eventId;
        $row = app($this->model)->find($eventId);
        $panel = PanelService::make()->get($row);
        $fields = $panel->getFields(['act' => 'edit']);
        /*
        $this->form_data = collect($fields)
            ->keyBy('name')
            ->map(
                function ($item) use ($row) {
                    return Arr::get($row, $item->name);
                }
            )
            ->all();
        */
        foreach ($fields as $field) {
            $value = Arr::get($row, $field->name);
<<<<<<< HEAD
            if (\is_object($value)) {
                switch (\get_class($value)) {
                    case 'Illuminate\Support\Carbon':
                        $value = $value->format('Y-m-d\TH:i');
                        break;
                    default:
                        dddx([\get_class($value)]);
                        break;
=======
            if (is_object($value)) {
                switch (get_class($value)) {
                case 'Illuminate\Support\Carbon':
                    $value = $value->format('Y-m-d\TH:i');
                    break;
                default:
                    dddx([get_class($value)]);
                    break;
>>>>>>> ede0df7 (first)
                }
            }
            Arr::set($this->form_data, $field->name, $value);
        }

<<<<<<< HEAD
        // dddx($this->form_data);
    }

    public function update(): void {
=======
        //dddx($this->form_data);
    }

    public function update(): void
    {
>>>>>>> ede0df7 (first)
        $row = app($this->model)->find($this->event_id);
        $panel = PanelService::make()->get($row);
        $panel->update($this->form_data);
    }

<<<<<<< HEAD
    public function cancel(): void {
=======
    public function cancel(): void
    {
>>>>>>> ede0df7 (first)
    }

    /*public function onEventDropped($eventId, $year, $month, $day): void {
    }*/

    /**
     * Render the component.
     *
     * @throws Exception
     *
     * @return \Illuminate\Contracts\View\View
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $events = $this->events();
        $view = $this->calendarView;
        $view_params = [
            'componentId' => $this->id,
            'monthGrid' => $this->monthGrid(),
            'events' => $events,
            'getEventsForDay' => function ($day) use ($events) {
                return $this->getEventsForDay($day, $events);
            },
        ];

        return view()->make($view, $view_params);
    }
}
