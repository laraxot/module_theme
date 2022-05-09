<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\FullCalendar;

/*
 * https://github.com/asantibanez/livewire-calendar/blob/master/src/LivewireCalendar.php
 */

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

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
abstract class BaseV2 extends Component
{
    public Carbon $startsAt;

    public Carbon $endsAt;

    public Carbon $gridStartsAt;

    public Carbon $gridEndsAt;

    public ?int $weekStartsAt;

    public ?int $weekEndsAt;

    public ?string $calendarView;

    public ?string $dayView;

    public ?string $eventView;

    public ?string $dayOfWeekView;

    public ?string $dragAndDropClasses;

    public ?string $beforeCalendarView;

    public ?string $afterCalendarView;

    public ?int $pollMillis;

    public string $pollAction;

    public bool $dragAndDropEnabled;

    public bool $dayClickEnabled;

    public bool $eventClickEnabled;

    /**
     * @var string[]
     */
    protected $casts = [
        'startsAt' => 'date',
        'endsAt' => 'date',
        'gridStartsAt' => 'date',
        'gridEndsAt' => 'date',
    ];

    /**
     * @param int|null    $initialYear
     * @param int|null    $initialMonth
     * @param int|null    $weekStartsAt
     * @param string|null $calendarView
     * @param string|null $dayView
     * @param string|null $eventView
     * @param string|null $dayOfWeekView
     * @param string|null $dragAndDropClasses
     * @param string|null $beforeCalendarView
     * @param string|null $afterCalendarView
     * @param int|null    $pollMillis
     * @param string      $pollAction
     * @param bool        $dragAndDropEnabled
     * @param bool        $dayClickEnabled
     * @param bool        $eventClickEnabled
     * @param array       $extras
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
        //$pollAction = null,
        $pollAction = '',
        $dragAndDropEnabled = true,
        $dayClickEnabled = true,
        $eventClickEnabled = true,
        $extras = []
    ): void {
        $this->weekStartsAt = $weekStartsAt ?? Carbon::SUNDAY;
        $this->weekEndsAt = Carbon::SUNDAY == $this->weekStartsAt
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
    }

    /**
     * @param array $extras
     */
    public function afterMount($extras = []): void
    {
    }

    /**
     * @param string|null $calendarView
     * @param string|null $dayView
     * @param string|null $eventView
     * @param string|null $dayOfWeekView
     * @param string|null $beforeCalendarView
     * @param string|null $afterCalendarView
     */
    public function setupViews($calendarView = null,
        $dayView = null,
        $eventView = null,
        $dayOfWeekView = null,
        $beforeCalendarView = null,
        $afterCalendarView = null
    ): void {
        $view = 'theme::livewire.full_calendar.v2';

        $this->calendarView = $calendarView ?? $view.'.calendar';
        $this->dayView = $dayView ?? $view.'.day';
        $this->eventView = $eventView ?? $view.'.event';
        $this->dayOfWeekView = $dayOfWeekView ?? $view.'.day-of-week';

        $this->beforeCalendarView = $beforeCalendarView ?? null;
        $this->afterCalendarView = $afterCalendarView ?? null;
    }

    /**
     * @param int|null $pollMillis
     * @param string   $pollAction
     */
    public function setupPoll($pollMillis, $pollAction): void
    {
        $this->pollMillis = $pollMillis;
        $this->pollAction = $pollAction;
    }

    public function goToPreviousMonth(): void
    {
        $this->startsAt->subMonthNoOverflow();
        $this->endsAt->subMonthNoOverflow();

        $this->calculateGridStartsEnds();
    }

    public function goToNextMonth(): void
    {
        $this->startsAt->addMonthNoOverflow();
        $this->endsAt->addMonthNoOverflow();

        $this->calculateGridStartsEnds();
    }

    public function goToCurrentMonth(): void
    {
        $this->startsAt = Carbon::today()->startOfMonth()->startOfDay();
        $this->endsAt = $this->startsAt->clone()->endOfMonth()->startOfDay();

        $this->calculateGridStartsEnds();
    }

    public function calculateGridStartsEnds(): void
    {
        $this->gridStartsAt = $this->startsAt->clone()->startOfWeek($this->weekStartsAt);
        $this->gridEndsAt = $this->endsAt->clone()->endOfWeek($this->weekEndsAt);
    }

    /**
     * @throws Exception
     *
     * @return mixed
     * @return mixed
     */
    public function monthGrid()
    {
        $firstDayOfGrid = $this->gridStartsAt;
        $lastDayOfGrid = $this->gridEndsAt;

        $numbersOfWeeks = $lastDayOfGrid->diffInWeeks($firstDayOfGrid) + 1;
        $days = $lastDayOfGrid->diffInDays($firstDayOfGrid) + 1;

        if (0 != $days % 7) {
            throw new Exception('Livewire Calendar not correctly configured. Check initial inputs.');
        }

        $monthGrid = collect();
        $currentDay = $firstDayOfGrid->clone();

        while (! $currentDay->greaterThan($lastDayOfGrid)) {
            $monthGrid->push($currentDay->clone());
            $currentDay->addDay();
        }

        $monthGrid = $monthGrid->chunk(7);
        if ($numbersOfWeeks != $monthGrid->count()) {
            throw new Exception('Livewire Calendar calculated wrong number of weeks. Sorry :(');
        }

        return $monthGrid;
    }

    public function events(): Collection
    {
        //return collect();
        return collect(
            [
            [
                'id' => 1,
                'title' => 'Breakfast',
                'description' => 'Pancakes! 🥞',
                'date' => Carbon::today(),
            ],
            [
                'id' => 2,
                'title' => 'Meeting with Pamela',
                'description' => 'Work stuff',
                'date' => Carbon::tomorrow(),
            ],
            ]
        );
    }

    public function getEventsForDay(int $day, Collection $events): Collection
    {
        return $events
            ->filter(
                function ($event) use ($day) {
                    return Carbon::parse($event['date'])->isSameDay((string) $day);
                }
            );
    }

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     */
    public function onDayClick($year, $month, $day): void
    {
    }

    /**
     * @param int $eventId
     */
    public function onEventClick($eventId): void
    {
    }

    public function onEventDropped(int $eventId, int $year, int $month, int $day): void
    {
    }

    /**
     * @throws Exception
     *
     * return Factory|View
     */
    public function render(): Renderable
    {
        $events = $this->events();

        if (null == $this->calendarView) {
            throw new \Exception('$this->calendarView is null ['.__LINE__.']['.__FILE__.']');
        }

        return view()->make($this->calendarView)
            ->with(
                [
                'componentId' => $this->id,
                'monthGrid' => $this->monthGrid(),
                'events' => $events,
                'getEventsForDay' => function ($day) use ($events) {
                    return $this->getEventsForDay($day, $events);
                },
                ]
            );
    }
}
