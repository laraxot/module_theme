<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Support;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;
use Lorisleiva\CronTranslator\CronTranslator;

class Cron extends XotBaseComponent
{
    /** @var string */
    public $schedule;

    /** @var bool */
    public $human = false;

    public function __construct(string $schedule, bool $human = false)
    {
        $this->schedule = $schedule;
        $this->human = $human;
    }

    public function render(): View
    {
        return view('theme::components.support.cron');
    }

    public function translate(): string
    {
        return CronTranslator::translate($this->schedule);
    }
}
