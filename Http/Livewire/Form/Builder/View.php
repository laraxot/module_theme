<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;

class View extends Component {
    public $props = [];

    public static function make($name, $data = []) {
        $component = new static();

        $component->props = [
            'name' => $name,
            'data' => $data,
        ];

        return $component;
    }

    public function render() {
        return view('theme::livewire.form.builder.v5.view');
    }
}
