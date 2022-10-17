<?php

declare(strict_types=1);

/*
https://github.com/dgvai/laravel-adminlte-components/blob/master/src/Components/Callout.php

MINIMUM USAGE

<x-dg-callout>This is callout</x-dg-callout>

or

<x-dg-callout type="warning" title="Oops!">
    This is callout
</x-dg-callout>

ALL AVAILABLE ATTRIBUTES

ATTRIBUTE    DETAILS                    REQUIRED    TYPE
title        Title of the Callout    false        string
type        Type of alert.
            Boostrap types:
            success, info,
            primary,... etc            false        string
*/

namespace Modules\Theme\View\Components\Info;

use Illuminate\View\Component;

class Callout extends Component {
    public array $attrs = [];

    public string $title;

    public function __construct(string $type, string $title) {
        $this->attrs['class'] = 'callout callout-'.$type;
        // $this->type = $type;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.info.callout';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
