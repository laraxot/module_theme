<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;
use Modules\Theme\Traits\Form\Builder\WithDisabled;
use Modules\Theme\Traits\Form\Builder\WithHelp;
use Modules\Theme\Traits\Form\Builder\WithModel;
use Modules\Theme\Traits\Form\Builder\WithPrefix;
use Modules\Theme\Traits\Form\Builder\WithSwitch;

class Checkbox extends Component {
    use WithPrefix;
    use WithSwitch;
    use WithHelp;
    use WithModel;
    use WithDisabled;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label) {
        $component = new static();

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'switch' => false,
            'help' => null,
            'model' => '.defer',
        ];

        $component->attrs = [
            'type' => 'checkbox',
            'disabled' => false,
        ];

        return $component;
    }

    public function render() {
        return view('laravel-livewire-forms::checkbox');
    }
}
