<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class V1 extends Component {
    public string $type;

    public array $form_data = [];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(?string $type = 'builder') {
        $this->type = $type;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v1.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
