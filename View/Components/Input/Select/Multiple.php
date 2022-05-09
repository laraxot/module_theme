<?php

/*
https://www.w3schools.com/tags/tag_select.asp
Attribute        Value        Description
-----------------------------------------------------------------
autofocus        autofocus    Specifies that the drop-down list should automatically get focus when the page loads
disabled        disabled    Specifies that a drop-down list should be disabled
form            form_id        Defines which form the drop-down list belongs to
multiple        multiple    Specifies that multiple options can be selected at once
name            name        Defines a name for the drop-down list
required        required    Specifies that the user is required to select a value before submitting the form
size            number        Defines the number of visible options in a drop-down list
*/

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input\Select;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Multiple.
 * meglio utilizzare input.php.
 */
class Multiple extends Component {
    public array $attrs = [];
    public array $options = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $options, string $name, string $class = null) {
        $this->options = $options;
        $this->attrs['name'] = $name;
        $this->attrs['id'] = 'form_'.$name;
        $this->attrs['class'] = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        return view()->make('theme::components.input.select.multiple');
    }
}
