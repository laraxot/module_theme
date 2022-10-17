<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class InputLw extends Component {
    /* è oggetto o array, probabilmente */
    public array $props;
    public array $attrs = [];
    public string $input_component = 'theme::components.label_input.with_size';
    public string $label = 'test';
    public string $name = 'name';
    public string $comp_view = '';
    public string $comp_ns = '';

    /**
     * @var mixed
     */
    public $value;

    /*
    $converted = Str::kebab('fooBar');// foo-bar
    $converted = Str::snake('fooBar'); // foo_bar
    $converted = Str::snake('fooBar', '-'); // foo-bar
    $converted = Str::camel('foo_bar'); // fooBar
    */

    public function __construct(array $props) {
        /*if (is_object($props)) {
            $props = get_object_vars($props);
        }*/

        $this->attrs['class'] = 'form-control';
        $this->attrs['wire:model'] = 'form_data.'.$props['name'];
        $this->attrs['name'] = $props['name'];

        $this->props = $props;
<<<<<<< HEAD
        // $this->label = $props['type'].'['.Str::snake($props['type'], '.').']';
=======
        //$this->label = $props['type'].'['.Str::snake($props['type'], '.').']';
>>>>>>> ede0df7 (first)
        $this->name = $props['name'];
        $this->label = $props['label'] ?? $props['name'];
        $this->value = $props['value'] ?? null;
    }

    /**
     * @return \Illuminate\Contracts\Support\Renderable|string
     */
    public function render() {
<<<<<<< HEAD
        // return '<div>'.print_r($this->props, true).'</div>';
=======
        //return '<div>'.print_r($this->props, true).'</div>';
>>>>>>> ede0df7 (first)
        $view = Str::snake($this->props['type'], '.');
        $this->comp_ns = 'theme::components.fields.'.$view;
        $view = $this->comp_ns.'.field';

        if (! view()->exists($view)) {
            return '<div>view not exists ['.$view.']</div>';
        }
        $this->comp_view = $view;

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
