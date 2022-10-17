<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use stdClass;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class InputField extends Component {
=======
class InputField extends Component
{
>>>>>>> ede0df7 (first)
    public array $attrs = [];
    public stdClass $field;

    /**
     * Undocumented function.
     */
<<<<<<< HEAD
    public function __construct(stdClass $field) {
=======
    public function __construct(stdClass $field)
    {
>>>>>>> ede0df7 (first)
        $this->field = $field;
        $this->attrs['name'] = $field->name;
        $this->attrs['wire:model'] = 'form_data.'.$field->name;
        $this->attrs['class'] = 'form-control';
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $type = $this->field->type;
        $type = Str::snake($type);
        /**
         * @phpstan-var view-string
         */
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        $type = $this->field->type;
        $type = Str::snake($type);
>>>>>>> ede0df7 (first)
        $view = 'theme::components.fields.'.$type.'.field';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
