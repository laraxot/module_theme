<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Modules\Xot\Services\PanelService;
use ReflectionMethod;
use stdClass;

/**
 * Undocumented class.
 */
class Input extends Component {
<<<<<<< HEAD
    public stdClass $field;
    // public ?string $label = null;
    // public string $for;
    // public ?string $name = null;
    // public ?string $type = null;
=======
    public ?stdClass $field = null;
    //public ?string $label = null;
    //public string $for;
    //public ?string $name = null;
    //public ?string $type = null;
>>>>>>> ede0df7 (first)

    public string $tradKey;
    public array $attrs = [];

<<<<<<< HEAD
    // public array $options = [];

    /**
     * ---.
     *
     * @param mixed|null $value
=======
    //public array $options = [];

    /**
     * Undocumented function.
>>>>>>> ede0df7 (first)
     */
    public function __construct(
        ?stdClass $field = null,
        ?string $name = null,
        ?string $type = null, // select.multiple, checkbox ecc.
        ?string $label = null,
        ?string $placeholder = null,
        ?string $class = null,
        ?array $options = null,
<<<<<<< HEAD
        ?string $icon = null,
        $value = null
=======
        ?string $icon = null
>>>>>>> ede0df7 (first)
    ) {
        try {
            $this->tradKey = 'pub_theme::txt';

            $request_panel = PanelService::make()->getRequestPanel();
<<<<<<< HEAD
            if (null !== $request_panel) {
=======
            if (! is_null($request_panel)) {
>>>>>>> ede0df7 (first)
                $this->tradKey = $request_panel->getTradMod();
            }
        } catch (\Error $e) {
            $this->tradKey = 'pub_theme::txt';
        }
<<<<<<< HEAD
        // --- Setting
        $this->field = (object) [];
        $refFunction = new ReflectionMethod(__CLASS__, __FUNCTION__);
        $parameters = $refFunction->getParameters();

        $args = \func_get_args();
=======
        //--- Setting
        $refFunction = new ReflectionMethod(__CLASS__, __FUNCTION__);
        $parameters = $refFunction->getParameters();
        $args = func_get_args();
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        if (null !== $class) {
=======
        if (null != $class) {
>>>>>>> ede0df7 (first)
            $this->attrs['class'] = $class;

            return $this;
        }

<<<<<<< HEAD
        $this->attrs['class'] = $this->field->class ?? 'form-control';
        if (null !== $this->field) {
=======
        $this->attrs['class'] = 'form-control';
        if (! is_null($this->field)) {
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    /**
     * Undocumented function.
     *
     * @param mixed $value
     */
    public function setValue($value): self {
        // if($value==null){
        //    $value=request($this->field->name) ?? old($this->field->name);
        // }
        $val = $this->field->value ?? $value;

        $this->field->value = $val;
        $this->attrs['value'] = $val;

        return $this;
    }

    public function setIcon(?string $icon = null): self {
        if (null === $icon) {
            return $this;
        }

        if (null !== $this->field) {
=======
    public function setIcon(?string $icon = null): self {
        if (null == $icon) {
            return $this;
        }

        if (! is_null($this->field)) {
>>>>>>> ede0df7 (first)
            $this->field->icon = $icon;
        }

        return $this;
    }

    public function setName(?string $name = null): self {
<<<<<<< HEAD
        if (null === $name) {
            return $this;
        }
        if (null !== $this->field) {
            $this->field->name = $name;
        }
        $this->attrs['name'] = $name;
        $this->attrs['wire:model.lazy'] = 'form_data.'.$name;
=======
        if (null == $name) {
            return $this;
        }
        if (! is_null($this->field)) {
            $this->field->name = $name;
        }
        $this->attrs['name'] = $name;
        $this->attrs['wire:model'] = 'form_data.'.$name;
>>>>>>> ede0df7 (first)

        return $this;
    }

    public function setType(?string $type = null): self {
<<<<<<< HEAD
        if (null === $type) {
            return $this;
        }
        // dddx($type);//select.multiple
        if (null !== $this->field) {
=======
        if (null == $type) {
            return $this;
        }
        //dddx($type);//select.multiple
        if (! is_null($this->field)) {
>>>>>>> ede0df7 (first)
            $this->field->type = $type;
        }

        return $this;
    }

    public function setLabel(?string $label = null): self {
<<<<<<< HEAD
        if (null === $label) {
            if (null !== $this->field) {
                $label = trans($this->tradKey.'.'.$this->field->name.'.label');
            }
        }

        $val = $this->field->label ?? $label;

        $this->field->label = $val;
        $this->attrs['label'] = $val;
=======
        if (null == $label) {
            if (! is_null($this->field)) {
                $label = trans($this->tradKey.'.'.$this->field->name.'.label');
            }
        }
        if (! is_null($this->field)) {
            $this->field->label = $label;
        }
>>>>>>> ede0df7 (first)

        return $this;
    }

    public function setPlaceholder(?string $placeholder = null): self {
<<<<<<< HEAD
        if (null === $placeholder) {
            if (null !== $this->field) {
=======
        if (null == $placeholder) {
            if (! is_null($this->field)) {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        if (null === $options) {
            return $this;
        }
        if (null !== $this->field) {
=======
        if (null == $options) {
            return $this;
        }
        if (! is_null($this->field)) {
>>>>>>> ede0df7 (first)
            $this->field->options = $options;
        }

        return $this;
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        // Strict comparison using === between null and stdClass will always evaluate to false.
        // if (null === $this->field) {
        //    throw new \Exception('this->field is null');
        // }
        $type = $this->field->type;

        $type = Str::snake($type);
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): \Illuminate\Contracts\Support\Renderable {
        if (is_null($this->field)) {
            throw new \Exception('this->field is null');
        }
        $type = $this->field->type;

        $type = Str::snake($type);
>>>>>>> ede0df7 (first)
        $view = 'theme::components.input.'.$type.'.field';

        $view_params = get_object_vars($this->field);

        $view_params['view'] = $view;

<<<<<<< HEAD
        $view_params['value'] = null; // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        // Call to an undefined method Illuminate\Contracts\View\Factory|Illuminate\Contracts\View\View::make().
        // return view()->make($view, $view_params);
        return View::make($view, $view_params);
=======
        $view_params['value'] = null; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        return view()->make($view, $view_params);
>>>>>>> ede0df7 (first)
    }
}
