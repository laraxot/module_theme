<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Input.
 */
<<<<<<< HEAD
class Input extends XotBaseComponent {
    /**
     * @var string
=======
class Input extends XotBaseComponent
{
    /**
     * 
     *
     * @var string 
>>>>>>> 2a3fafb (up)
     */
    public ?string $name;

    public string $id;

    public string $type;

    /**
<<<<<<< HEAD
     * @var string
     */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '') {
=======
     * 
     *
     * @var string 
     */
    public $value;

    public function __construct(string $name, string $id = null, string $type = 'text', ?string $value = '')
    {
>>>>>>> 2a3fafb (up)
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->type = $type;
        $this->value = old($name, $value ?? '');
    }

<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> 2a3fafb (up)
        $view = 'theme::components.forms.inputs.input';

        return view()->make($view);
    }
}
