<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\View\Component;
use stdClass;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class Group extends Component {
=======
class Group extends Component
{
>>>>>>> ede0df7 (first)
    public stdClass $field;
    public string $label;
    public string $for;
    public array $attrs = [];

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __construct(stdClass $field) {
        // $this->field = get_object_vars($field);
=======
    public function __construct(stdClass $field)
    {
        //$this->field = get_object_vars($field);
>>>>>>> ede0df7 (first)
        $this->field = $field;
        $this->attrs['name'] = $field->name;
        $this->label = $field->name;
        $this->for = 'form_data.'.$field->name;
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.inputs.group';
        $view_params = [
            'view' => $view,
            'field' => (object) $this->field,
        ];

        return view()->make($view, $view_params);
    }
}
