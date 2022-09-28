<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Sort;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Rows extends Component {
    public Collection $rows;
    public array $model_keys = [];

    /**
     * Undocumented function.
     *
     * @param Collection $data
     *
     * @return void
     */
    public function mount(Collection $rows) {
        $this->rows = $rows;
        $this->model_keys = $rows->modelKeys();
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.sort.rows';
        $view_params = [];

        return view($view, $view_params);
    }

    public function updateRowOrder(array $order) {
        $new_order = collect($order)->pluck('value')->all();
        $class = get_class($this->rows[0]);

        $res = $class::setNewOrder($new_order);
        $this->rows = $class::whereIn('id', $new_order)->ordered()->get();
    }

    public function moveUp(int $id) {
        $row = $this->rows->firstWhere('id', $id)->moveOrderUp();
        $class = get_class($this->rows[0]);
        $this->rows = $class::whereIn('id', $this->model_keys)->ordered()->get();
    }

    public function moveDown(int $id) {
        $row = $this->rows->firstWhere('id', $id)->moveOrderDown();
        $class = get_class($this->rows[0]);
        $this->rows = $class::whereIn('id', $this->model_keys)->ordered()->get();
    }
}
