<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Input.
 */
class Input extends XotBaseComponent {
    /**
     * @var string
     */
    public ?string $name;

    public string $id;

    public string $type;

    /**
     * @var string
     */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '') {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
    }

    public function render(): Renderable {
        $view = 'theme::components.forms.inputs.input';

        return view()->make($view);
    }
}
