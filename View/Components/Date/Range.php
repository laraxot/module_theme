<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Date;

use Closure;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

class Range extends Component {
    public string $topclass;
    public string $inputclass;
    public string $title;
    public string $icon;
    public string $id;
    public int $init;
    public Closure $callback;

    public function __construct(
        string $id,
        string $topclass,
        string $title,
        string $icon,
        int $init,
        Closure $callback,
        string $inputclass = ''
    ) {
        $this->id = $id;
        $this->topclass = $topclass;
        $this->inputclass = $inputclass;
        $this->title = $title;
        $this->icon = $icon;
        $this->init = $init;
        $this->callback = $callback;
    }

    public function initiator(): string {
        $s = '';
        switch ($this->init) {
            case 0: $s = 'startDate: moment(), endDate: moment()';
                break;
            case 1: $s = "startDate: moment().subtract(1, 'days'), endDate: moment().subtract(1, 'days')";
                break;
            case 2: $s = "startDate: moment().subtract(6, 'days'), endDate: moment()";
                break;
            case 3: $s = "startDate: moment().subtract(29, 'days'), endDate: moment()";
                break;
            case 4: $s = "startDate: moment().startOf('month'), endDate: moment().endOf('month')";
                break;
            case 5: $s = "startDate: moment().subtract(1, 'month').startOf('month'), endDate: moment().subtract(1, 'month').endOf('month')";
                break;
        }

        return $s;
    }

    public function render(): Renderable {
        return view('theme::components.date.range');
    }
}
