<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\DateTime;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Countdown.
 */
class Countdown extends XotBaseComponent {
    public string $id;

    public \DateTimeInterface $expires;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine'];

    public function __construct(\DateTimeInterface $expires) {
        $this->id = 'timer-'.Str::random(6);
        $this->expires = $expires;
    }

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

    public function difference(): \DateInterval {
        return $this->expires->diff(now());
    }
}
