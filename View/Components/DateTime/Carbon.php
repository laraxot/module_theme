<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\DateTime;

use Carbon\Carbon as CarbonAlias;
use Carbon\CarbonInterface;
use DateTimeInterface;
use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Carbon.
 */
<<<<<<< HEAD
class Carbon extends XotBaseComponent {
=======
class Carbon extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public CarbonInterface $date;

    public string $format;

    public bool $human;

    public string $local;

    /**
     * @var string[]
     */
    protected static array $assets = ['moment'];

    public function __construct(
        DateTimeInterface $date,
        string $format = 'Y-m-d H:i:s',
        bool $human = false,
        string $local = ''
    ) {
        $this->date = CarbonAlias::instance($date);
        $this->format = $format;
        $this->human = $human;
        $this->local = $local;
    }

<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.date-time.carbon';

        return view()->make($view);
    }
}
