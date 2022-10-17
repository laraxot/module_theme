<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\DateTime;

use DateInterval;
use DateTimeInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Countdown.
 */
<<<<<<< HEAD
class Countdown extends XotBaseComponent {
=======
class Countdown extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public string $id;

    public DateTimeInterface $expires;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine'];

<<<<<<< HEAD
    public function __construct(DateTimeInterface $expires) {
=======
    public function __construct(DateTimeInterface $expires)
    {
>>>>>>> ede0df7 (first)
        $this->id = 'timer-'.Str::random(6);
        $this->expires = $expires;
    }

<<<<<<< HEAD
    public function render(): View {
        return view()->make('theme::components.date-time.countdown');
    }

    public function days(): string {
        return sprintf('%02d', $this->difference()->d);
    }

    public function hours(): string {
        return sprintf('%02d', $this->difference()->h);
    }

    public function minutes(): string {
        return sprintf('%02d', $this->difference()->i);
    }

    public function seconds(): string {
        return sprintf('%02d', $this->difference()->s);
    }

    public function difference(): DateInterval {
=======
    public function render(): View
    {
        return view()->make('theme::components.date-time.countdown');
    }

    public function days(): string
    {
        return sprintf('%02d', $this->difference()->d);
    }

    public function hours(): string
    {
        return sprintf('%02d', $this->difference()->h);
    }

    public function minutes(): string
    {
        return sprintf('%02d', $this->difference()->i);
    }

    public function seconds(): string
    {
        return sprintf('%02d', $this->difference()->s);
    }

    public function difference(): DateInterval
    {
>>>>>>> ede0df7 (first)
        return $this->expires->diff(now());
    }
}
