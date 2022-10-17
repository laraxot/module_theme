<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Input;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Slider.
 */
class Slider extends Component {
    public string $driver = 'noui';
    public array $attrs = [];
    public float $min = 0;
    public float $max = 100;
    public array $values = [0, 100];

<<<<<<< HEAD
    /**
     * Undocumented variable.
     *
     * @var array
     */
=======
>>>>>>> ede0df7 (first)
    protected $listeners = [
        'setSliderMinMax' => 'setMinMax',
        'setSliderValues' => 'setValues',
        'test' => 'test',
    ];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $id, ?string $driver = null) {
        if (null !== $driver) {
            $this->driver = $driver;
        }
        $this->attrs['id'] = $id;
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
        $view = 'theme::livewire.input.slider.'.$this->driver;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * Set min - max of slider.
     */
<<<<<<< HEAD
    public function setMinMax(float $min, float $max): void {
=======
    public function setMinMax(float $min, float $max) {
>>>>>>> ede0df7 (first)
        $this->min = $min;
        $this->max = $max;
        $this->dispatchBrowserEvent('setSliderMinMax', ['min' => $min, 'max' => $max]);
    }

    /**
     * set values of range.
     */
<<<<<<< HEAD
    public function setValues(array $values): void {
=======
    public function setValues(array $values) {
>>>>>>> ede0df7 (first)
        $this->values = $values;
        $this->dispatchBrowserEvent('setSliderValues', ['values' => $values]);
    }

<<<<<<< HEAD
    public function updateValues(array $values): void {
=======
    public function updateValues(array $values) {
>>>>>>> ede0df7 (first)
        $this->values = $values;
        $this->emit('updateSliderValues', $values);
        $this->emit('updateSliderValues', $values);
    }

<<<<<<< HEAD
    // * 4 debug
    public function test(): void {
        dddx($this->values);
    }

    // */
=======
    //* 4 debug
    public function test() {
        dddx($this->values);
    }

    //*/
>>>>>>> ede0df7 (first)
}
