<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

use Illuminate\Support\Str;

/**
 * Class FieldService.
 */
class FieldFilter {
    public string $param_name;
    public string $field_name;
    public string $where_method;
    public array $rules;

    /**
     * Undocumented function.
     */
    public function __construct() {
    }

    /**
     * Undocumented function.
     */
    public static function make(): self {
        return new self();
    }

    /**
     * Undocumented function.
     */
    public function setVars(array $vars): self {
        foreach ($vars as $k => $v) {
            $func = 'set'.Str::Studly($k);
            /*
            if(!method_exists($this,$func)){
                dddx(['k'=>$k,'v'=>$v]);
            }
            //*/
            $this->{$func}($v);
        }

        return $this;
    }

    /**
     * Undocumented function.
     */
    public function setParamName(string $param_name): self {
        $this->param_name = $param_name;

        return $this;
    }

    public function setFieldName(string $field_name): self {
        $this->field_name = $field_name;

        return $this;
    }

    public function setWhereMethod(string $where_method): self {
        $this->where_method = $where_method;

        return $this;
    }

    /**
     * @param string|array $rules
     */
    public function setRules($rules): self {
        if (\is_string($rules)) {
            $rules = explode('|', $rules);
        }
        $this->rules = $rules;

        return $this;
    }
}
