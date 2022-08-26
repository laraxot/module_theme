<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Input;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Arr // Array is reserved.
 */
class Arr extends Component {
    public string $type;
    public string $name;
    public array $form_data;
    public array $value = [];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $type, string $name, ?array $value) {
        $this->type = $type;
        $this->name = $name;
        $data = request()->all();
        
        if (is_array($value)) {
            
            $data[$name] = array_merge($value, $data[$name] ?? []);
        }

        $this->form_data = $data;

   
        // $data[$name] ?? [];
        // dddx($this->form_data);
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.input.arr.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function addArr(): void {
        $this->form_data[$this->name][] = null;
    }

    public function subArr(int $id): void {
        unset($this->form_data[$this->name][$id]);
    }
}
