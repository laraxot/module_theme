<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form\Builder;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\Theme\Http\Livewire\Form\Builder\Button;
use Modules\Theme\Http\Livewire\Form\Builder\Input;

class Arr extends Component {
    public array $arr;
    public array $btn;

    public array $fields;
    public array $buttons;

    public function __construct(array $arr, array $btn) {
        $this->arr = $arr;
        $this->btn = $btn;
        $this->fields = $this->fields();
        $this->buttons = $this->buttons();
    }

    public function render(): Renderable {
        $view = 'theme::components.form.builder.arr';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function fields() {
        $r = [];

        foreach ($this->arr as $item) {
            $type = $item['type'];
            switch ($item['type']) {
                case 'String':
                    $type = 'text';
                    break;
            }
            $r[] = Input::make($item['name'], $item['label'] ?? $item['name'])->type($type);
        }

        return $r;
    }

    /*
    public function buttons() {
        $r = [];

        foreach ($this->btn as $item) {
            $r[] = Button::make($item['label']);
        }

        return $r;
    }
    */
}
