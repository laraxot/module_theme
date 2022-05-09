<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Exception;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Modules\Xot\Services\FileService;
use Modules\Xot\Services\PanelService;
use ReflectionMethod;
use stdClass;

/**
 * Undocumented class.
 */
class Group extends Component {
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

    public function __construct(
        ?stdClass $field = null,
        ?string $name = null,
        ?string $type = null,
        ?string $label = null,
        ?string $placeholder = null,
        ?string $class = null,
        ?array $options = null,
        ?int $colSize = null,
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
        if (! is_null($this->field)) {
            $this->field->placeholder = $placeholder;
        }

        return $this;
    }

    public function setOptions(?array $options = null): self {
        $options = is_array($options) ? $options : [];
        if (! is_null($this->field)) {
            $this->field->options = $options;
        }

        return $this;
    }

    public function setColSize(?int $colSize = null): self {
        if (null == $colSize) {
            return $this;
        }
        $this->colSize = $colSize;

        return $this;
    }

    /**
     * Get the view / contents that represents the component.
     */
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

        $view_params = [
            'view' => $view,
            'field' => (object) $this->field,
        ];

        return view()->make($view, $view_params);
    }
}
