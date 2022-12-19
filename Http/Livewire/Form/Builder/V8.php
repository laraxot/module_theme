<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class V8 extends Component {
    public array $form_data = [];

    // dati di base
    public array $base_data = [
        [
            'name' => 'blood_group',
            'translations' => ['italian', 'english'],
        ],
    ];

    // protected $listener = ['saveData' => 'saveData'];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount() {
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v8';

        $view_params = [
        ];

        return view()->make($view, $view_params);
    }
}
