<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\View\Component;
use Modules\Xot\Services\FileService;
use stdClass;

/**
 * Undocumented class.
 */
class Label extends Component {
    public ?stdClass $field = null;
    public ?string $label = null;
    public string $for;
    public ?string $name = null;
    public ?string $type = null;
    public array $attrs = [];
    public bool $isRequired = false;

    /**
     * Undocumented function.
     */
    public function __construct(?stdClass $field = null, ?string $label = null, ?string $name = null, ?string $type = null) {
        if (\is_object($field) && isset($field->name)) {
            $this->field = $field;
            $this->name = $field->name;
            $this->label = $field->label;
        }
        if (isset($label)) {
            $this->label = $label;
        }
        if (isset($name)) {
            $this->name = $name;
        }
        if (isset($type)) {
            $this->type = $type;
        }
        /*
        if (null == $this->label) {
            $this->label = $this->name;
        }
        */
        $this->attrs['name'] = $this->name;
        $this->attrs['class'] = 'form-label';
        $this->for = 'form_data.'.$this->name;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $theme = inAdmin() ? 'adm_theme' : 'pub_theme';
        FileService::viewCopy('theme::components.input.label', $theme.'::components.input.label');

        $view = $theme.'::components.input.label';
        if (null === $this->field) {
            $this->field = (object) [
                'name' => $this->name,
                'type' => $this->type,
            ];
        }

        $view_params = [
            'view' => $view,
            'field' => (object) $this->field,
        ];

        return view()->make($view, $view_params);
    }
}
