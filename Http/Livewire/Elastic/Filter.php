<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Elastic;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Filter.
 */
class Filter extends Component {
    public string $type = 'v1';

    public array $must = [];
    public array $must_not = [];
    public array $should = [];

    /**
     * Undocumented function.
     *
     * @param Model $row
     *
     * @return void
     */
    public function mount($row = null) {
        if (null != $row) {
            $this->must = $row->must ?? [];
            $this->must_not = $row->must_not ?? [];
            $this->should = $row->should ?? [];
        }
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.elastic.filter.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
