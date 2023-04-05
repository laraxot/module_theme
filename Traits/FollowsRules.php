<?php
/**
* @see https://github.com/kdion4891/laravel-livewire-forms/blob/master/src/Traits/FollowsRules.php
*/

declare(strict_types=1);

namespace Modules\Theme\Traits;

use Modules\Theme\Services\FieldService;

/**
 * Trait FollowsRules.
 */
trait FollowsRules
{
    /**
     * @param bool $realtime
     *
     * @return array
     */
    public function rules($realtime = false)
    {
        $rules = [];
        $rules_ignore = $realtime ? $this->rulesIgnoreRealtime() : [];

        foreach ($this->fields() as $field) {
            if ($field->rules) {
                $rules[$field->key] = $this->fieldRules($field, $rules_ignore);
            }

            // File fields need more complex logic since they are technically arrays
            // Right now we can only do simple validation with file fields

            foreach ($field->array_fields as $array_field) {
                if ($array_field->rules) {
                    $rules[$field->key.'.*.'.$array_field->name] = $this->fieldRules($array_field, $rules_ignore);
                }
            }
        }

        return $rules;
    }

    /**
     * @param FieldService $field
     * @param array        $rules_ignore
     *
     * @return array|bool|string[]
     */
    public function fieldRules($field, $rules_ignore)
    {
        // $field_rules = is_array($field->rules) ? $field->rules : explode('|', $field->rules);
        $field_rules = $field->rules;
        // 51     Else branch is unreachable because ternary operator condition is always true.

        // if ($rules_ignore) {
        $field_rules = array_udiff(
            $field_rules,
            $rules_ignore,
            function ($a, $b): int {
                $returned_variable = (int) ($a !== $b);

                return $returned_variable;
            }
        );
        // }

        return $field_rules;
    }

    /**
     * @return array
     */
    public function rulesIgnoreRealtime()
    {
        return [];
    }
}
