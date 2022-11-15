<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\View\Component;
use Modules\Theme\Traits\Form\Builder\WithDisabled;
use Modules\Theme\Traits\Form\Builder\WithPrefix;

class File extends Component {
    use WithPrefix;
    use WithHelp;
    use WithDisabled;

    public $props = [];
    public $attrs = [];

    public static function make($name, $label = null) {
        $component = new static();

        $component->props = [
            'name' => $name,
            'label' => $label,
            'prefix' => null,
            'disk' => config('filesystems.default'),
            'help' => null,
        ];

        $component->attrs = [
            'type' => 'file',
            'multiple' => false,
            'disabled' => false,
        ];

        return $component;
    }

    public function disk($disk) {
        $this->props['disk'] = $disk;

        return $this;
    }

    public function multiple() {
        $this->attrs['multiple'] = true;

        return $this;
    }

    public function render() {
        return view('theme::livewire.form.builder.v5.file');
    }
}
