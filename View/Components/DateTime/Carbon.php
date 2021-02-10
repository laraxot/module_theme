<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\DateTime;

use Carbon\Carbon as CarbonAlias;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Carbon
 * @package Modules\Theme\View\Components\DateTime
 */
class Carbon extends XotBaseComponent {
    /** @var CarbonInterface */
    public CarbonInterface $date;

    /** @var string */
    public string $format;

    /** @var bool */
    public bool $human;

    /** @var string */
    public string $local;

    /**
     * @var string[]
     */
    protected static array $assets = ['moment'];

    public function __construct(
        DateTimeInterface $date,
        string $format = 'Y-m-d H:i:s',
        bool $human = false,
        ?string $local = null
    ) {
        $this->date = CarbonAlias::instance($date);
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }

    public function render(): View {
        return view('theme::components.date-time.carbon');
    }
}
