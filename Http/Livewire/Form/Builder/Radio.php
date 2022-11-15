<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;
use Modules\Theme\Traits\Form\Builder\WithDisabled;
use Modules\Theme\Traits\Form\Builder\WithHelp;
use Modules\Theme\Traits\Form\Builder\WithModel;
use Modules\Theme\Traits\Form\Builder\WithOptions;
use Modules\Theme\Traits\Form\Builder\WithPrefix;
use Modules\Theme\Traits\Form\Builder\WithSwitch;

class Radio extends Component {
    use WithPrefix;
    use WithOptions;
    use WithSwitch;
    use WithHelp;
    use WithModel;
    use WithDisabled;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null) {
        $component = new static();

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'options' => [],
            'switch' => false,
            'help' => null,
            'model' => '.defer',
        ];

        $component->attrs = [
            'type' => 'radio',
            'disabled' => false,
        ];

        return $component;
    }

    public function render() {
        return view('laravel-livewire-forms::radio');
    }
}
