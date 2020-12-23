<?php

declare(strict_types=1);

namespace Modules\Theme\Views\Components\DateTime;

use Modules\Xot\Views\Components\XotBaseComponent;
use Carbon\Carbon as CarbonAlias;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Contracts\View\View;

class Carbon extends XotBaseComponent
{
    /** @var CarbonInterface */
    public $date;

    /** @var string */
    public $format;

    /** @var bool */
    public $human;

    /** @var string|null */
    public $local;

    protected static $assets = ['moment'];

    public function __construct(
        DateTimeInterface $date,
        string $format = 'Y-m-d H:i:s',
        bool $human = false,
        $local = null
    ) {
        $this->date = CarbonAlias::instance($date);
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }

    public function render(): View
    {
        return view('theme::components.date-time.carbon');
    }
}
