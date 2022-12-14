<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Support\Str;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class InputField extends Component {
    public array $attrs = [];
    public \stdClass $field;

    /**
     * Undocumented function.
     */
    public function __construct(\stdClass $field) {
        $this->field = $field;
        $this->attrs['name'] = $field->name;
        $this->attrs['wire:model'] = 'form_data.'.$field->name;
        $this->attrs['class'] = 'form-control';
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $type = $this->field->type;
        $type = Str::snake($type);
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.fields.'.$type.'.field';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
