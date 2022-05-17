<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Input\Status;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

/**
 * Class Select.
 * https://github.com/spatie/laravel-model-status.
 */
class Select extends Component {
    public Model $model;
    public array $options;
    public string $status = '';

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(Model $model, array $options) {
        $this->model = $model;
        $this->options = $options;
        $this->status = $model->status;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): Renderable {
        $view = 'theme::livewire.input.status.select';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function changeStatus(): void {
        if ('' != $this->status) {
            if (! is_null($this->model->status())) {
                $this->model->status()->delete();
            }
            $this->model->setStatus($this->status);
            session()->flash('message', 'Status Changed');
        }

        if ('' == $this->status) {
            $this->model->status()->delete(); // returns the latest instance of `Spatie\ModelStatus\Status`
            session()->flash('message', 'Status Removed');
        }
    }
}
