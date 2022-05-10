<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class BootstrapSelect.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class BootstrapSelect extends XotBaseComponent {
    public string $id;
    public string $type = 'bootstrap_select';
    public array $attrs = [];
    public array $options;
    public string $datastyle;

    public function __construct(string $id, array $options, string $datastyle) {
        $this->id = $id;
        $this->datastyle = $datastyle;
        $this->options = $options;

        // $this->attrs['class'] = 'col-lg-4 col-6 px-1 mb-2';
    }

    public function render(): Renderable {
        $view = 'theme::components.bootstrap_select.'.$this->type;
        $view_params = [
            'datastyle' => $this->datastyle,
            'options' => $this->options,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
