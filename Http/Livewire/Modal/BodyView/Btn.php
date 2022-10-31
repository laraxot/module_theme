<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal\BodyView;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Modules\Theme\Http\Livewire\Modal\BodyView as BaseComponent;

/**
 * Class Sort/Collection.
 */
class Btn extends BaseComponent
{
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.modal.body_view.btn';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
