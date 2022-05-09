<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Modules\Xot\Services\PanelService;
use ReflectionMethod;
use stdClass;

/**
 * Undocumented class.
 */
class Input extends Component {
    public ?stdClass $field = null;
    //public ?string $label = null;
    //public string $for;
    //public ?string $name = null;
    //public ?string $type = null;

    public string $tradKey;
    public array $attrs = [];

    //public array $options = [];

    /**
     * Undocumented function.
     */
    public function __construct(
        ?stdClass $field = null,
        ?string $name = null,
        ?string $type = null, // select.multiple, checkbox ecc.
        ?string $label = null,
        ?string $placeholder = null,
        ?string $class = null,
        ?array $options = null,
        ?string $icon = null
    ) {
        try {
            $this->tradKey = 'pub_theme::txt';

            $request_panel = PanelService::make()->getRequestPanel();
            if (! is_null($request_panel)) {
                $this->tradKey = $request_panel->getTradMod();
            }
        } catch (\Error $e) {
            $this->tradKey = 'pub_theme::txt';
        }
        //--- Setting
        $refFunction = new ReflectionMethod(__CLASS__, __FUNCTION__);
        $parameters = $refFunction->getParameters();
        $args = func_get_args();
        $data = collect([]);
        foreach ($parameters as $k => $v) {
            $tmp = [
                'name' => $v->getName(),
                'value' => $args[$k],
            ];
            $data->push($tmp);
        }

        foreach ($data as $k => $v) {
            $func = 'set'.Str::studly($v['name']);
            $this->{$func}($v['value']);
        }
    }

    public function setField(stdClass $field): self {
        $this->field = $field;

        if (isset($field->name)) {
            $this->setName($field->name);
        }

        return $this;
    }

    public function setClass(?string $class = null): self {
        if (null != $class) {
            $this->attrs['class'] = $class;

            return $this;
        }

        $this->attrs['class'] = 'form-control';
        if (! is_null($this->field)) {
            switch ($this->field->type) {
                case 'checkbox':
                    $this->attrs['class'] = 'form-check-input';
                    break;
                case 'select.multiple':
                    $this->attrs['class'] = 'selectpicker form-control';
                    $this->attrs['multiple'] = 'multiple';
                    $this->attrs['data-style'] = 'btn-selectpicker';

                    $this->attrs['data-selected-text-format'] = 'count &gt; 1';
                    $this->attrs['data-none-selected-text'] = '';
                    break;
            }
        }

        return $this;
    }

    public function setIcon(?string $icon = null): self {
        if (null == $icon) {
            return $this;
        }

        if (! is_null($this->field)) {
            $this->field->icon = $icon;
        }

        return $this;
    }

    public function setName(?string $name = null): self {
        if (null == $name) {
            return $this;
        }
        if (! is_null($this->field)) {
            $this->field->name = $name;
        }
        $this->attrs['name'] = $name;
        $this->attrs['wire:model'] = 'form_data.'.$name;

        return $this;
    }

    public function setType(?string $type = null): self {
        if (null == $type) {
            return $this;
        }
        //dddx($type);//select.multiple
        if (! is_null($this->field)) {
            $this->field->type = $type;
        }

        return $this;
    }

    public function setLabel(?string $label = null): self {
        if (null == $label) {
            if (! is_null($this->field)) {
                $label = trans($this->tradKey.'.'.$this->field->name.'.label');
            }
        }
        if (! is_null($this->field)) {
            $this->field->label = $label;
        }

        return $this;
    }

    public function setPlaceholder(?string $placeholder = null): self {
        if (null == $placeholder) {
            if (! is_null($this->field)) {
                $placeholder = trans($this->tradKey.'.'.$this->field->name.'.placeholder');
            }
        }

        if (! isset($this->field->placeholder)) {
            $this->field->placeholder = $placeholder;
        }

        $this->attrs['placeholder'] = $this->field->placeholder;

        return $this;
    }

    public function setOptions(?array $options = null): self {
        if (null == $options) {
            return $this;
        }
        if (! is_null($this->field)) {
            $this->field->options = $options;
        }

        return $this;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        if (is_null($this->field)) {
            throw new \Exception('this->field is null');
        }
        $type = $this->field->type;

        $type = Str::snake($type);
        $view = 'theme::components.input.'.$type.'.field';

        $view_params = get_object_vars($this->field);

        $view_params['view'] = $view;

        $view_params['value'] = null; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        return view()->make($view, $view_params);
    }
}
