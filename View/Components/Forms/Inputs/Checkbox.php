<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;

/**
 * Class Checkbox.
 */
<<<<<<< HEAD
class Checkbox extends Input {
    public bool $checked;

    public function __construct(string $name, string $id = null, bool $checked = false) {
=======
class Checkbox extends Input
{
    public bool $checked;

    public function __construct(string $name, string $id = null, bool $checked = false)
    {
>>>>>>> 2a3fafb (up)
        parent::__construct($name, $id, 'checkbox');

        $this->checked = (bool) old($name, $checked);
    }

<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> 2a3fafb (up)
        $view = 'theme::components.forms.inputs.checkbox';

        return view()->make($view);
    }
}
