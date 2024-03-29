<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
 * Class Field.
 */
class ToggleBool extends Component
{
    public Model $model;
    public string $field;
    public bool $isActive;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount()
    {
        // $this->model = $model;
        // $this->field = $field;
        $this->isActive = (bool) $this->model->getAttribute($this->field);
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.input.toggle-date';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function updating(string $field, mixed $value)
    {
        $this->model->setAttribute($this->field, $value);
        $this->model->save();
        $this->emit('updateField', $this->model->getKey(), $this->field, $value);
    }
}
