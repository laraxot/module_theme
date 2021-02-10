<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Textarea
 * @package Modules\Theme\View\Components\Forms\Inputs
 */
class Textarea extends XotBaseComponent {
    /** @var string */
    public ?string $name;

    /** @var string */
    public string $id;

    /** @var int */
    public int $rows;

    public function __construct(string $name, string $id = null, int $rows = 3) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

    public function render(): View {
        return view('theme::components.forms.inputs.textarea');
    }
}
