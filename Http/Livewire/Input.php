<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;

/**
 * Class Numberer.
 */
<<<<<<< HEAD
class Input extends Component {
=======
class Input extends Component
{
>>>>>>> ede0df7 (first)
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
        ?string $label = null,
        ?string $class = null,
        ?string $id = null,
        ?string $value = null,
        ?string $placeholder = null
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
<<<<<<< HEAD
    public function render() {
        /**
         * @phpstan-var view-string
         */
=======
    public function render()
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.fields.'.$this->type.'.field';
        $view_params = [
            'view' => $view,
        ];
<<<<<<< HEAD
        // return '<div>'.$view.'</div>';
=======
        //return '<div>'.$view.'</div>';
>>>>>>> ede0df7 (first)

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
