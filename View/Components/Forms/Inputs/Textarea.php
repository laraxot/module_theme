<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Textarea.
 */
class Textarea extends XotBaseComponent
{
    /**
     * @var string
     */
    public ?string $name;

    public string $id;

    public int $rows;

    public function __construct(string $name, string $id = null, int $rows = 3)
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

    public function render(): Renderable
    {
        $view = 'theme::components.forms.inputs.textarea';

        return view()->make($view);
    }
}
