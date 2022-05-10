<?php

declare(strict_types=1);

namespace Modules\Theme\Traits;

/*
* https://github.com/kdion4891/laravel-livewire-forms/blob/master/src/Traits/HandlesArrays.php

*/

/**
 * Trait HandlesArrays.
 */
trait HandlesArrays {
    /**
     * @param string $field_name
     *
     * @return void
     */
    public function arrayAdd($field_name) {
        $array_fields = [];

        foreach ($this->fields() as $field) {
            if ($field->name === $field_name) {
                foreach ($field->array_fields as $array_field) {
                    $array_fields[$array_field->name] = $array_field->default ?? ('checkboxes' === $array_field->type ? [] : null);
                }

                break;
            }
        }

        $this->form_data[$field_name][] = $array_fields;
        $this->updated('form_data.'.$field_name);
    }

    /**
     * @param string $field_name
     * @param int    $key
     *
     * @return void
     */
    public function arrayMoveUp($field_name, $key) {
        if ($key > 0) {
            $prev = $this->form_data[$field_name][$key - 1];
            $this->form_data[$field_name][$key - 1] = $this->form_data[$field_name][$key];
            $this->form_data[$field_name][$key] = $prev;
        }
    }

    /**
     * @param string $field_name
     * @param int    $key
     *
     * @return void
     */
    public function arrayMoveDown($field_name, $key) {
        if (($key + 1) < \count($this->form_data[$field_name])) {
            $next = $this->form_data[$field_name][$key + 1];
            $this->form_data[$field_name][$key + 1] = $this->form_data[$field_name][$key];
            $this->form_data[$field_name][$key] = $next;
        }
    }

    /**
     * @param string $field_name
     * @param int    $key
     *
     * @return void
     */
    public function arrayRemove($field_name, $key) {
        unset($this->form_data[$field_name][$key]);
        $this->form_data[$field_name] = array_values($this->form_data[$field_name]);
    }

    public function updated(string $boh): void {
        dddx($boh);
    }
}
