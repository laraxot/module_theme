<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;

class DynamicComponent extends Component
{
    public $props = [];
    public $attrs = [];

    public static function make($name, $attrs = [])
    {
        $component = new static();

        $component->props = [
            'name' => $name,
        ];

        $component->attrs = $attrs;

        return $component;
    }

    public function render()
    {
        return view('theme::livewire.form.builder.v5.dynamic-component');
    }
}
