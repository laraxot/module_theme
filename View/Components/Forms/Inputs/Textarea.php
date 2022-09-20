<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Textarea.
 */
<<<<<<< HEAD
class Textarea extends XotBaseComponent {
    /**
     * @var string
=======
class Textarea extends XotBaseComponent
{
    /**
     * 
     *
     * @var string 
>>>>>>> 2a3fafb (up)
     */
    public ?string $name;

    public string $id;

    public int $rows;

<<<<<<< HEAD
    public function __construct(string $name, string $id = null, int $rows = 3) {
=======
    public function __construct(string $name, string $id = null, int $rows = 3)
    {
>>>>>>> 2a3fafb (up)
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->rows = $rows;
    }

<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> 2a3fafb (up)
        $view = 'theme::components.forms.inputs.textarea';

        return view()->make($view);
    }
}
