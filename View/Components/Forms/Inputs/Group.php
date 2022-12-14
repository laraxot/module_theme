<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Group extends Component {
    public \stdClass $field;
    public string $label;
    public string $for;
    public array $attrs = [];

    /**
     * Undocumented function.
     */
    public function __construct(\stdClass $field) {
        // $this->field = get_object_vars($field);
        $this->field = $field;
        $this->attrs['name'] = $field->name;
        $this->label = $field->name;
        $this->for = 'form_data.'.$field->name;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $view = 'theme::components.inputs.group';
        $view_params = [
            'view' => $view,
            'field' => (object) $this->field,
        ];

        return view()->make($view, $view_params);
    }
}
