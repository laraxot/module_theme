<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;

/**
 * Class Numberer.
 */
class Input extends Component
{
    public string $type;
    public string $name;
    public ?string $label;
    public ?string $class;
    public ?string $input_id;
    public ?string $value;
    public ?string $placeholder;

    /**
     * Undocumented function.
     */
    public function mount(
        string $type,
        string $name,
        string $label = null,
        string $class = null,
        string $id = null,
        string $value = null,
        string $placeholder = null
    ): void {
        $this->type = $type;
        $this->name = $name;
        $this->label = $label;
        $this->class = $class;
        $this->input_id = $id;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render()
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.fields.'.$this->type.'.field';
        $view_params = [
            'view' => $view,
        ];
        // return '<div>'.$view.'</div>';

        return view()->make($view, $view_params);
    }

    /*
    public function increment(): void {
        ++$this->count;
    }

    public function decrement(): void {
        --$this->count;
    }
    */
}
