<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;
use Modules\Theme\Traits\Form\Builder\WithDisabled;
use Modules\Theme\Traits\Form\Builder\WithHelp;
use Modules\Theme\Traits\Form\Builder\WithModel;
use Modules\Theme\Traits\Form\Builder\WithPlaceholder;
use Modules\Theme\Traits\Form\Builder\WithPrefix;
use Modules\Theme\Traits\Form\Builder\WithReadonly;
use Modules\Theme\Traits\Form\Builder\WithSizing;

class Input extends Component
{
    use WithPrefix;
    use WithSizing;
    use WithHelp;
    use WithModel;
    use WithDisabled;
    use WithReadonly;
    use WithPlaceholder;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null)
    {
        $component = new static();

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'append' => null,
            'prepend' => null,
            'plaintext' => false,
            'small' => false,
            'large' => false,
            'help' => null,
            'model' => '.defer',
        ];

        $component->attrs = [
            'type' => 'text',
            'inputmode' => 'text',
            'disabled' => false,
            'readonly' => false,
        ];

        return $component;
    }

    public function type($type)
    {
        $this->attrs['type'] = $type;

        if ('text' == $type) {
            $this->attrs['inputmode'] = 'text';
        } elseif ('number' == $type) {
            $this->attrs['inputmode'] = 'numeric';
        } elseif ('tel' == $type) {
            $this->attrs['inputmode'] = 'tel';
        } elseif ('search' == $type) {
            $this->attrs['inputmode'] = 'search';
        } elseif ('email' == $type) {
            $this->attrs['inputmode'] = 'email';
        } elseif ('url' == $type) {
            $this->attrs['inputmode'] = 'url';
        }

        return $this;
    }

    public function append($append)
    {
        $this->props['append'] = $append;

        return $this;
    }

    public function prepend($prepend)
    {
        $this->props['prepend'] = $prepend;

        return $this;
    }

    public function plaintext($plaintext = true)
    {
        $this->props['plaintext'] = $plaintext;
        $this->attrs['readonly'] = $plaintext;

        return $this;
    }

    public function render()
    {
        return view('theme::livewire.form.builder.v5.input');
    }
}
