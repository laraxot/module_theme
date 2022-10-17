<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Session\SessionManager;
use Illuminate\Support\Carbon;
use Livewire\Component;

<<<<<<< HEAD
// use Modules\Cart\Models\BookingItem;
=======
//use Modules\Cart\Models\BookingItem;
>>>>>>> ede0df7 (first)

/**
 * full calendar
 * https://github.com/asantibanez/livewire-calendar
 * https://github.com/stijnvanouplines/livewire-calendar/blob/master/app/Http/Livewire/Calendar.php.
 */
<<<<<<< HEAD
class Calendar extends Component {
=======
class Calendar extends Component
{

>>>>>>> ede0df7 (first)
    public ?string $minDate;

    public ?string $maxDate;

    public mixed $selectedDay;

    public mixed $selectedMonth;

    public mixed $selectedYear;

    public mixed $selectedDate;

    public mixed $weekDay;

    public mixed $selectedTime;

    public mixed $currentMonth;

    public mixed $currentYear;
<<<<<<< HEAD
    // ----------------------------------
=======
    //----------------------------------
>>>>>>> ede0df7 (first)

    public int $guest_num;

    public mixed $containers;

    public mixed $items;

    public mixed $shop;

    public mixed $opening_hours;

<<<<<<< HEAD
    public function mount(SessionManager $session, string $minDate = null, string $maxDate = null): void {
=======
    public function mount(SessionManager $session, string $minDate = null, string $maxDate = null):void
    {
>>>>>>> ede0df7 (first)
        $session->put('calendar.now', now());

        $this->minDate = $minDate;
        $this->maxDate = $maxDate;

        $this->guest_num = 1;

        $this->setDate();

        [$this->containers, $this->items] = params2ContainerItem();
        $this->shop = last($this->items);
        $this->selectedTime = null;
    }

<<<<<<< HEAD
    private function setDate(): void {
=======
    private function setDate(): void
    {
>>>>>>> ede0df7 (first)
        /*
        $this->selectedDay = session('calendar.now')->day;
        $this->selectedMonth = $this->currentMonth = session('calendar.now')->month;
        $this->selectedYear = $this->currentYear = session('calendar.now')->year;
        */
        $this->currentMonth = session('calendar.now')->month;
        $this->currentYear = session('calendar.now')->year;
        $this->setByDay(session('calendar.now')->day);
    }

<<<<<<< HEAD
    public function calendar(): array {
        $days = [];

        $startOfMonthDay = Carbon::createFromDate($this->currentYear, $this->currentMonth)->startOfMonth()->isoWeekday();
        if (! is_int($startOfMonthDay)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

=======
    public function calendar(): array
    {
        $days = [];

        $startOfMonthDay = intval(Carbon::createFromDate($this->currentYear, $this->currentMonth)->startOfMonth()->isoWeekday());
>>>>>>> ede0df7 (first)
        for ($i = 1; $i < $startOfMonthDay; ++$i) {
            $days[] = null;
        }

<<<<<<< HEAD
        $daysInMonth = Carbon::createFromDate($this->currentYear, $this->currentMonth)->daysInMonth;
        if (! is_int($daysInMonth)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

=======
        $daysInMonth = intval(Carbon::createFromDate($this->currentYear, $this->currentMonth)->daysInMonth);
>>>>>>> ede0df7 (first)
        for ($i = 1; $i <= $daysInMonth; ++$i) {
            $days[] = $i;
        }

<<<<<<< HEAD
        $endOfMonthDay = Carbon::createFromDate($this->currentYear, $this->currentMonth)->endOfMonth()->isoWeekday();
        if (! is_int($endOfMonthDay)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

=======
        $endOfMonthDay = intval(Carbon::createFromDate($this->currentYear, $this->currentMonth)->endOfMonth()->isoWeekday());
>>>>>>> ede0df7 (first)
        for ($i = 7; $i > $endOfMonthDay; --$i) {
            $days[] = null;
        }

        $daysArray = collect($days)->map(
            function ($day) {
                return [
<<<<<<< HEAD
                    'day' => $day,
                    'current' => $this->isCurrentDay($day),
                    'selected' => $this->isDaySelected($day),
                    'disabled' => $this->isDayDisabled($day),
=======
                'day' => $day,
                'current' => $this->isCurrentDay($day),
                'selected' => $this->isDaySelected($day),
                'disabled' => $this->isDayDisabled($day),
>>>>>>> ede0df7 (first)
                ];
            }
        )
            ->toArray();

        return array_chunk($daysArray, 7);
    }

<<<<<<< HEAD
    private function isCurrentDay(int $day = null): bool {
=======
    private function isCurrentDay(int $day = null): bool
    {
>>>>>>> ede0df7 (first)
        if ($day !== session('calendar.now')->day) {
            return false;
        }

        if ($this->currentMonth !== session('calendar.now')->month) {
            return false;
        }

        if ($this->currentYear !== session('calendar.now')->year) {
            return false;
        }

        return true;
    }

<<<<<<< HEAD
    private function isDaySelected(int $day = null): bool {
=======
    private function isDaySelected(int $day = null): bool
    {
>>>>>>> ede0df7 (first)
        if ($day !== $this->selectedDay) {
            return false;
        }

        if ($this->currentMonth !== $this->selectedMonth) {
            return false;
        }

        if ($this->currentYear !== $this->selectedYear) {
            return false;
        }

        return true;
    }

<<<<<<< HEAD
    private function isDayDisabled(int $day = null): bool {
=======
    private function isDayDisabled(int $day = null): bool
    {
>>>>>>> ede0df7 (first)
        if (null === $day) {
            return true;
        }

        if ($this->currentMonth === Carbon::parse($this->minDate)->month
            && $this->currentYear === Carbon::parse($this->minDate)->year
            && $day < Carbon::parse($this->minDate)->day
        ) {
            return true;
        }

        if ($this->currentMonth === Carbon::parse($this->maxDate)->month
            && $this->currentYear === Carbon::parse($this->maxDate)->year
            && $day < Carbon::parse($this->maxDate)->day
        ) {
            return true;
        }

        return false;
    }

<<<<<<< HEAD
    public function setByMonth(int $month): void {
=======
    public function setByMonth(int $month): void
    {
>>>>>>> ede0df7 (first)
        if ($month > 12) {
            $this->currentYear = $this->currentYear + 1;

            $this->currentMonth = 1;

            return;
        }

        if ($month < 1) {
            $this->currentYear = $this->currentYear - 1;

            $this->currentMonth = 12;

            return;
        }

        $this->currentMonth = $month;
    }

<<<<<<< HEAD
    public function setByDay(int $day = null): void {
        if (null === $day) {
=======
    public function setByDay(int $day = null): void
    {
        if (is_null($day)) {
>>>>>>> ede0df7 (first)
            return;
        }

        $this->selectedYear = $this->currentYear;
        $this->selectedMonth = $this->currentMonth;
        $this->selectedDay = $day;

        $this->selectedDate = Carbon::create($this->selectedYear, $this->selectedMonth, $this->selectedDay);
<<<<<<< HEAD
        // Carbon::weekday Get/set the weekday from 0 (Sunday) to 6 (Saturday).
        // Carbon::isoWeekday Get/set the ISO weekday from 1 (Monday) to 7 (Sunday).
        if (false === $this->selectedDate) {
            throw new \Exception('Can not convert selectedDate to false');
        } else {
=======
        //Carbon::weekday Get/set the weekday from 0 (Sunday) to 6 (Saturday).
        //Carbon::isoWeekday Get/set the ISO weekday from 1 (Monday) to 7 (Sunday).
        if($this->selectedDate===false) {
            throw new \Exception("Can not convert selectedDate to false");
        }else{
>>>>>>> ede0df7 (first)
            $this->weekDay = $this->selectedDate->weekday();
        }
    }

    /**
     * @param string $time
     */
<<<<<<< HEAD
    public function setByTime($time = null): void {
=======
    public function setByTime($time = null): void
    {
>>>>>>> ede0df7 (first)
        /*if (is_null($time)) {
            return;
        }
        */
        $this->selectedTime = $time;
    }

<<<<<<< HEAD
    public function showPreviousArrow(): bool {
=======
    public function showPreviousArrow(): bool
    {
>>>>>>> ede0df7 (first)
        if (! $this->minDate) {
            return true;
        }

        if (Carbon::parse($this->minDate)->year === $this->currentYear
            && Carbon::parse($this->minDate)->month === $this->currentMonth
        ) {
            return false;
        }

        return true;
    }

<<<<<<< HEAD
    public function showNextArrow(): bool {
=======
    public function showNextArrow(): bool
    {
>>>>>>> ede0df7 (first)
        if (! $this->maxDate) {
            return true;
        }

        if (Carbon::parse($this->maxDate)->year === $this->currentYear
            && Carbon::parse($this->maxDate)->month === $this->currentMonth
        ) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public function bookingTimes() {
=======
    public function bookingTimes()
    {
>>>>>>> ede0df7 (first)
        $guest_num = (int) $this->guest_num;
        $this->selectedDate = Carbon::create($this->selectedYear, $this->selectedMonth, $this->selectedDay);
        $this->opening_hours = $this->shop->openingHours()->where('day_of_week', $this->weekDay)->get();
        $bookings = $this->shop->bookings()->where('reserve_date', $this->selectedDate)->get();
        $items = $this->shop->bookingItems()->whereRaw($guest_num.' between min_capacity and max_capacity')->get();
        $data = [];
<<<<<<< HEAD
        if (null === $items) {
=======
        if (null == $items) {
>>>>>>> ede0df7 (first)
            return $data;
        }
        foreach ($this->opening_hours as $opening_hour) {
            $open_at = Carbon::createFromTimeString($opening_hour->open_at);
            $close_at = Carbon::createFromTimeString($opening_hour->close_at);

            for ($curr_at = $open_at; $curr_at < $close_at; $curr_at->addMinutes(15)) {
                $bookings_taken = $bookings->filter(
                    function ($item) use ($curr_at) {
                        $reserve_time = Carbon::createFromTimeString($item->reserve_time);

                        return $reserve_time->between($curr_at->copy()->subHours(2), $curr_at->copy()->addHours(2));
                    }
                );
                $booking_items_taken = $bookings_taken->pluck('booking_item_id')->all();
                $items_free = $items->filter(
                    function ($item) use ($booking_items_taken) {
<<<<<<< HEAD
                        return ! \in_array($item->id, $booking_items_taken, true);
=======
                        return ! in_array($item->id, $booking_items_taken);
>>>>>>> ede0df7 (first)
                    }
                )->all();

                $data[] = (object) [
                    'time' => $curr_at->format('H:i'),
                    'bookings_count' => $bookings_taken->count(),
<<<<<<< HEAD
                    'items_free_count' => \count($items_free),
=======
                    'items_free_count' => count($items_free),
>>>>>>> ede0df7 (first)
                ];
            }
        }

        return $data;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
<<<<<<< HEAD
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $guest_num = (int) $this->guest_num;
        // -- da vedere come passare i parametri
=======
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        $guest_num = (int) $this->guest_num;
        //-- da vedere come passare i parametri
>>>>>>> ede0df7 (first)
        $this->items = $this->shop->bookingItems()->whereRaw($guest_num.' between min_capacity and max_capacity')->get();
        $this->opening_hours = $this->shop->openingHours()->where('day_of_week', $this->weekDay)->get();

        return view()->make(
<<<<<<< HEAD
            'theme::livewire.calendar',
            [
                'calendar' => $this->calendar(),
                'items' => $this->items,
                'opening_hours' => $this->opening_hours,
                'booking_times' => $this->bookingTimes(),
                // 'selectedDate' => $this->selectedDate,
                'selectedTime' => $this->selectedTime,
=======
            'theme::livewire.calendar', [
            'calendar' => $this->calendar(),
            'items' => $this->items,
            'opening_hours' => $this->opening_hours,
            'booking_times' => $this->bookingTimes(),
            //'selectedDate' => $this->selectedDate,
            'selectedTime' => $this->selectedTime,
>>>>>>> ede0df7 (first)
            ]
        );
    }
}
