<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Input;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
 * Class Field.
 */
class ToggleDate extends Component {
    public Model $model;
    public string $field;
    public bool $isActive;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount() {
<<<<<<< HEAD
        // $this->model = $model;
        // $this->field = $field;
=======
        //$this->model = $model;
        //$this->field = $field;
>>>>>>> ede0df7 (first)
        $this->isActive = null !== $this->model->getAttribute($this->field);
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
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
    public function updating(string $field, mixed $value) {
        $val = $value ? now() : null;
<<<<<<< HEAD
        $this->model->setAttribute($this->field, $val);
        $this->model->save();
=======
        $this->model->setAttribute($this->field, $val)->save();
>>>>>>> ede0df7 (first)
        $this->emit('updateField', $this->model->getKey(), $this->field, $val);
    }
}
