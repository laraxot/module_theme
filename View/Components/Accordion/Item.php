<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Accordion;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Item.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Item extends XotBaseComponent {
    public array $attrs;

    public function __construct(string $id, string $title, string $i) {
        $this->attrs['id'] = $id;
        $this->attrs['title'] = $title;
        //$this->attrs['description'] = $description;
        $this->attrs['i'] = $i;
    }

    public function render(): Renderable {
        $view = 'theme::components.accordion.item';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
