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
    public bool $update_model=false;

    protected $listener = ["updateModel"];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $type, string $name, ?array $value, ?bool $update_model) {
        $this->type = $type;
        $this->name = $name;
        $this->update_model=$update_model;

        $data = request()->all();
        
        if (is_array($value)) {
            
            $data[$name] = array_merge($value, $data[$name] ?? []);
        }

        $this->form_data = $data;

   
        // $data[$name] ?? [];
        // dddx($this->form_data);
    }

    public function updateModel(){

        $data = request()->all();

        $this->form_data = $data;

        dddx([$data,$this->name]);

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
