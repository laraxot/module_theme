<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Exception;
<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;
=======
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Modules\Xot\Services\FileService;
>>>>>>> ede0df7 (first)
use Modules\Xot\Services\PanelService;
use ReflectionMethod;
use stdClass;

/**
 * Undocumented class.
 */
class Group extends Component {
<<<<<<< HEAD
    public stdClass $field;
    public ?string $label = null;
    // public string $for;
    // public ?string $name = null;
    public ?string $type = null;
    // public ?string $bs_col_size = null;
    public array $attrs = [];
    // public ?array $options = null; //serve per il select
    public int $colSize = 12;
    public string $tradKey;

    public string $tpl = 'default';

    public array $div_attrs = [];
    public array $label_attrs = [];
    public array $input_attrs = [];

=======
    public ?stdClass $field = null;
    //public ?string $label = null;
    //public string $for;
    //public ?string $name = null;
    //public ?string $type = null;
    //public ?string $bs_col_size = null;
    public array $attrs = [];
    //public ?array $options = null; //serve per il select
    public int $colSize = 12;
    public string $tradKey;

>>>>>>> ede0df7 (first)
    /**
     * Undocumented function.
     */
    /*
    public function __construct(?stdClass $field = null, ?string $label = null, ?string $name = null, ?string $type = null, ?string $bs_col_size = null, ?array $options = null) {
        if (is_object($field) && isset($field->name)) {
            $this->field = $field;
            $this->name = $field->name;
            $this->label = $field->label;
            if(isset($field->options)){
                $this->options = $field->options;
            }
        }
        if (isset($name)) {
            $this->name = $name;
        }
        if (isset($options)) {
            $this->options = $options;
        }
        if (isset($type)) {
            $this->type = $type;
        }
        if (isset($bs_col_size)) {
            $this->bs_col_size = $bs_col_size;
        }

        if (isset($label)) {
            $this->label = $label;
        } else {
            $this->tradKey = PanelService::make()->getRequestPanel()->getTradMod();
            $this->label = trans($this->tradKey.'.'.$this->name.'_label');
        }
        if(!isset($this->type)){
            throw new Exception('Inserire il type');
            //throw new \ErrorException('Error found');
        }
        $this->attrs['name'] = $this->name;
        $this->attrs['class'] = 'col-'.$this->bs_col_size;
        $this->for = 'form_data.'.$this->name;
    }
    */

<<<<<<< HEAD
    /**
     * Undocumented function.
     *
     * @param mixed|null $value
     */
=======
>>>>>>> ede0df7 (first)
    public function __construct(
        ?stdClass $field = null,
        ?string $name = null,
        ?string $type = null,
        ?string $label = null,
        ?string $placeholder = null,
        ?string $class = null,
        ?array $options = null,
        ?int $colSize = null,
<<<<<<< HEAD
        ?string $icon = null,
        ?string $tpl = null,
        $value = null
    ) {
        $panel = PanelService::make()->getRequestPanel();
        $this->tradKey = 'pub_theme::txt';
        if (null !== $panel) {
            $this->tradKey = $panel->getTradMod();
        }
        $this->field = (object) [];
        // --- Setting
        $refFunction = new ReflectionMethod(__CLASS__, __FUNCTION__);
        $parameters = $refFunction->getParameters();
        $args = \func_get_args();
=======
        ?string $icon = null
    ) {
        $panel = PanelService::make()->getRequestPanel();
        $this->tradKey = 'pub_theme::txt';
        if (null != $panel) {
            $this->tradKey = $panel->getTradMod();
        }

        //--- Setting
        $refFunction = new ReflectionMethod(__CLASS__, __FUNCTION__);
        $parameters = $refFunction->getParameters();
        $args = func_get_args();
>>>>>>> ede0df7 (first)
        $data = collect([]);
        foreach ($parameters as $k => $v) {
            $tmp = [
                'name' => $v->getName(),
<<<<<<< HEAD
                'value' => $args[$k] ?? $field->{$v->getName()} ?? $field->{Str::snake($v->getName())} ?? null,
            ];
            $data->push($tmp);
        }
=======
                'value' => $args[$k],
            ];
            $data->push($tmp);
        }

>>>>>>> ede0df7 (first)
        foreach ($data as $k => $v) {
            $func = 'set'.Str::studly($v['name']);
            $this->{$func}($v['value']);
        }
<<<<<<< HEAD

        $this->type = $type;
    }

    public function setTpl(?string $tpl): self {
        if (null !== $tpl) {
            $this->tpl = $tpl;
        }

        return $this;
    }

    /**
     * Undocumented function.
     *
     * @param mixed $value
     */
    public function setValue($value): self {
        if (null == $value) {
            $value = request($this->field->name) ?? old($this->field->name);
        }
        $this->field->value = $value;

        return $this;
=======
>>>>>>> ede0df7 (first)
    }

    public function setField(stdClass $field): self {
        $this->field = $field;
<<<<<<< HEAD
=======
        if (isset($field->name)) {
            $this->setName($field->name);
        }
>>>>>>> ede0df7 (first)

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
        // $this->attrs['class'] = 'form-control';
        $this->attrs['class'] = 'form-control form-control-solid';

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
<<<<<<< HEAD
                    $this->attrs['data-live-search'] = 'true';
=======

>>>>>>> ede0df7 (first)
                    $this->attrs['data-selected-text-format'] = 'count &gt; 1';
                    $this->attrs['data-none-selected-text'] = '';
                    break;
            }
        }
<<<<<<< HEAD
        $this->field->class = $this->attrs['class'];
=======
>>>>>>> ede0df7 (first)

        return $this;
    }

    public function setIcon(?string $icon = null): self {
<<<<<<< HEAD
        $this->field->icon = $icon;
=======
        if (null == $icon) {
            return $this;
        }
        if (! is_null($this->field)) {
            $this->field->icon = $icon;
        }
>>>>>>> ede0df7 (first)

        return $this;
    }

    public function setName(?string $name = null): self {
<<<<<<< HEAD
        $this->field->name = $name;

=======
        if (null == $name) {
            return $this;
        }
        if (! is_null($this->field)) {
            $this->field->name = $name;
        }
>>>>>>> ede0df7 (first)
        $this->attrs['name'] = $name;
        $this->attrs['wire:model'] = 'form_data.'.$name;

        return $this;
    }

    public function setType(?string $type = null): self {
<<<<<<< HEAD
        $this->field->type = $type;
=======
        if (null == $type) {
            return $this;
        }
        //dddx($type);//select.multiple
        if (! is_null($this->field)) {
            $this->field->type = $type;
        }
>>>>>>> ede0df7 (first)

        return $this;
    }

    public function setLabel(?string $label = null): self {
<<<<<<< HEAD
        if (null === $label) {
            $trans_key = $this->tradKey.'.'.$this->field->name.'.label';
            $label = trans($trans_key);
        }

        $this->field->label = $label;
        $this->attrs['label'] = $label;
        $this->label = $label;
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
            $placeholder = trans($this->tradKey.'.'.$this->field->name.'.placeholder');
        }
        $this->field->placeholder = $placeholder;
=======
        if (null == $placeholder) {
            if (! is_null($this->field)) {
                $placeholder = trans($this->tradKey.'.'.$this->field->name.'.placeholder');
            }
        }
        if (! is_null($this->field)) {
            $this->field->placeholder = $placeholder;
        }
>>>>>>> ede0df7 (first)

        return $this;
    }

    public function setOptions(?array $options = null): self {
<<<<<<< HEAD
        $options = \is_array($options) ? $options : [];
        $this->field->options = $options;
=======
        $options = is_array($options) ? $options : [];
        if (! is_null($this->field)) {
            $this->field->options = $options;
        }
>>>>>>> ede0df7 (first)

        return $this;
    }

    public function setColSize(?int $colSize = null): self {
<<<<<<< HEAD
        if (null === $colSize) {
            $colSize = 12;
        }
        $this->colSize = $colSize;
        $this->div_attrs['class'] = 'col-'.$colSize;
=======
        if (null == $colSize) {
            return $this;
        }
        $this->colSize = $colSize;
>>>>>>> ede0df7 (first)

        return $this;
    }

    /**
     * Get the view / contents that represents the component.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.group.'.$this->tpl;
=======
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $theme = inAdmin() ? 'adm_theme' : 'pub_theme';
        FileService::viewCopy('theme::components.input.group', $theme.'::components.input.group');

        $view = $theme.'::components.input.group';
        /*
        if (null == $this->field) {
            $this->field = (object) [
                'name' => $this->name,
                'type' => $this->type,
                'label' => $this->label,
                'options' => $this->options,
            ];
        }
        */
>>>>>>> ede0df7 (first)

        $view_params = [
            'view' => $view,
            'field' => (object) $this->field,
        ];

<<<<<<< HEAD
        return View::make($view, $view_params);
    }

    public function shouldRender(): bool {
        return true;
=======
        return view()->make($view, $view_params);
>>>>>>> ede0df7 (first)
    }
}
