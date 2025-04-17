<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;
use Modules\Theme\Traits\Form\Builder\WithDisabled;
use Modules\Theme\Traits\Form\Builder\WithHelp;
use Modules\Theme\Traits\Form\Builder\WithModel;
use Modules\Theme\Traits\Form\Builder\WithOptions;
use Modules\Theme\Traits\Form\Builder\WithPrefix;
use Modules\Theme\Traits\Form\Builder\WithSizing;

class Select extends Component
{
    use WithPrefix;
    use WithOptions;
    use WithSizing;
    use WithHelp;
    use WithModel;
    use WithDisabled;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null)
    {
        $component = new static();

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'placeholder' => null,
            'options' => [],
            'small' => false,
            'large' => false,
            'help' => null,
            'model' => '.defer',
        ];

        $component->attrs = [
            'disabled' => false,
        ];

        return $component;
    }

    public function placeholder($placeholder)
    {
        $this->props['placeholder'] = $placeholder;

        return $this;
    }

    public function render()
    {
        return view('theme::livewire.form.builder.v5.select');
    }
}
