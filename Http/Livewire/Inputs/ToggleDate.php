<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Inputs;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
 * Class Field.
 */
class ToggleDate extends Component
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
        $this->isActive = null !== $this->model->getAttribute($this->field);
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        $view = 'theme::livewire.inputs.toggle-date';
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
        $val = $value ? now() : null;
        $this->model->setAttribute($this->field, $val)->save();
        $this->emit('updateField', $this->model->getKey(), $this->field, $val);
    }
}
