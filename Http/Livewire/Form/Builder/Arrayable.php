<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;
use Modules\Theme\Traits\Form\Builder\WithDisabled;
use Modules\Theme\Traits\Form\Builder\WithHelp;

class Arrayable extends Component {
    use WithHelp;
    use WithDisabled;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null) {
        $component = new static();

        $component->props = [
            'name' => $name,
            'label' => $label,
            'fields' => [],
            'help' => null,
        ];

        $component->attrs = [
            'disabled' => false,
        ];

        return $component;
    }

    public function fields($fields = []) {
        $this->props['fields'] = $fields;

        return $this;
    }

    public function render() {
        return view('laravel-livewire-forms::arrayable');
    }
}
