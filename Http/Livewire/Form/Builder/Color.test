<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;
use Modules\Theme\Traits\Form\Builder\WithDisabled;
use Modules\Theme\Traits\Form\Builder\WithHelp;
use Modules\Theme\Traits\Form\Builder\WithModel;
use Modules\Theme\Traits\Form\Builder\WithPrefix;
use Modules\Theme\Traits\Form\Builder\WithReadonly;
use Modules\Theme\Traits\Form\Builder\WithSizing;

class Color extends Component {
    use WithPrefix;
    use WithSizing;
    use WithHelp;
    use WithModel;
    use WithDisabled;
    use WithReadonly;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null) {
        $component = new static();

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'small' => false,
            'large' => false,
            'help' => null,
            'model' => '.defer',
        ];

        $component->attrs = [
            'type' => 'color',
            'disabled' => false,
            'readonly' => false,
        ];

        return $component;
    }

    public function render() {
        return view('theme::livewire.form.builder.v5.color');
    }
}
