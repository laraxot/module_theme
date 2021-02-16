<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\DateTime;

use Modules\Xot\View\Components\XotBaseComponent;
use DateInterval;
use DateTimeInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

/**
 * Class Countdown
 * @package Modules\Theme\View\Components\DateTime
 */
class Countdown extends XotBaseComponent
{
    /** @var string */
    public string $id;

    /** @var DateTimeInterface */
    public DateTimeInterface $expires;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine'];

    public function __construct(DateTimeInterface $expires)
    {
        $this->id = 'timer-'.Str::random(6);
        $this->expires = $expires;
    }

    public function render(): View
    {
        return view('theme::components.date-time.countdown');
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
        return $this->expires->diff(now());
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\DateTime;

use Modules\Xot\View\Components\XotBaseComponent;
use DateInterval;
use DateTimeInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

/**
 * Class Countdown
 * @package Modules\Theme\View\Components\DateTime
 */
class Countdown extends XotBaseComponent
{
    /** @var string */
    public string $id;

    /** @var DateTimeInterface */
    public DateTimeInterface $expires;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine'];

    public function __construct(DateTimeInterface $expires)
    {
        $this->id = 'timer-'.Str::random(6);
        $this->expires = $expires;
    }

    public function render(): View
    {
        return view('theme::components.date-time.countdown');
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
        return $this->expires->diff(now());
    }
}
>>>>>>> a83164a (first)
