<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

use Collective\Html\FormFacade as Form;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;
use Illuminate\Database\Eloquent\Relations\MorphOneOrMany;
// ---- services ---
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\Xot\Services\PolicyService;
use Modules\Xot\Services\RouteService;

/**
 * Class FormXService.
 */
class FormXService {
    /**
     * ora selectRelationshipOne
     * da select/field_relationship_one.blade.php
     * a  select/relationship/one/field.blade.php.
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */

    /*
    When the element is displayed after the call to freeze(), only its value is displayed without the input tags,
    thus the element cannot be edited. If persistant freeze is set,
    then hidden field containing the element value will be output, too.
    */

    /**
     * retrocompatibilita.
     */
    public static function getComponents(): array {
        $view_path = __DIR__.'/../Resources/views/collective/fields';
        $namespace = '';
        $prefix = 'theme::';

        return CollectiveService::getComponents($view_path, $namespace, $prefix);
    }

    /**
     * @param BelongsTo|HasManyThrough|HasOneOrMany|BelongsToMany|MorphOneOrMany|MorphPivot|MorphTo|MorphToMany $rows
     */
    public static function fieldsExcludeRows($rows): array {
        $fields_exclude = [];

        $fields_exclude[] = 'id';

        if (method_exists($rows, 'getForeignKeyName')) {
            $fields_exclude[] = $rows->getForeignKeyName();
        }
        if (method_exists($rows, 'getForeignPivotKeyName')) {
            $fields_exclude[] = $rows->getForeignPivotKeyName();
        }
        if (method_exists($rows, 'getRelatedPivotKeyName')) {
            $fields_exclude[] = $rows->getRelatedPivotKeyName();
        }
        if (method_exists($rows, 'getMorphType')) {
            $fields_exclude[] = $rows->getMorphType();
        }
        $fields_exclude[] = 'related_type'; // -- ??

        return $fields_exclude;
    }

    /*public static function fieldsExclude(array $params): array {
        extract($params);
        if (! isset($rows)) {
            throw new \Exception('rows is missing ['.__LINE__.']['.__FILE__.']');
        }

        $fields_exclude = array();

        array_push($fields_exclude , 'id');

        if (method_exists($rows, 'getForeignKeyName')) {
            array_push($fields_exclude , $rows->getForeignKeyName());
        }
        if (method_exists($rows, 'getForeignPivotKeyName')) {
            array_push($fields_exclude ,$rows->getForeignPivotKeyName());
        }
        if (method_exists($rows, 'getRelatedPivotKeyName')) {
            array_push($fields_exclude , $rows->getRelatedPivotKeyName());
        }
        if (method_exists($rows, 'getMorphType')) {
            array_push($fields_exclude , $rows->getMorphType());
        }
        array_push($fields_exclude , 'related_type'); //-- ??

        return $fields_exclude;
    }*/

    // ret \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string|void

    public static function inputFreeze(array $params): Renderable {
        extract($params);
        if (! isset($field)) {
            throw new \Exception('field is missing');
        }
        if (! isset($row)) {
            throw new \Exception('row is missing');
        }

        $field->name_dot = bracketsToDotted($field->name);

        if (\in_array('value', array_keys($params), true)) {
            $field->value = $params['value'];
        } else {
            try {
                $field->value = Arr::get($row, $field->name_dot);
                if (null === $field->value) {
                    $field->value = Arr::get((array) $row, $field->name_dot);
                }
                // $field->value = $row->{$field->name_dot};
                // $field->value = 'test['.$field->name_dot.']'.Arr::get($row, 'nome_diri');
            } catch (\Exception $e) {
                $field->value = '---['.$field->name_dot.']['.$e->getMessage().']['.__LINE__.'-'.basename(__FILE__).']['.$row->{$field->name_dot}.']--';
            }
        }

        // return '['.__LINE__.__FILE__.']';

        if (isset($label)) {
            $field->label = $label;
        }

        $tmp = Str::snake($field->type);

        /*
        * @phpstan-var view-string

        $view = 'theme::includes.components.input.'.$tmp.'.freeze';
        */
        /*
        /*

        $view = 'theme::collective.fields.'.$tmp.'.freeze';

        if (isset($field->sub_type)) {
            $view .= '_'.Str::snake($field->sub_type);
        }

        if (! View::exists($view)) {
            //return '<span style="color:#d60021">['.$view.'] NOT EXISTS !!</span>';
            $tmp1 = Str::before($tmp, '_');
            $tmp2 = Str::after($tmp, '_');
            //$view1 = 'theme::includes.components.input.'.$tmp1.'.freeze_'.$tmp2;
            $view1 = 'theme::collective.fields.'.$tmp1.'.freeze_'.$tmp2;

            if (! View::exists($view1)) {
                dddx([
                    'type' => $field->type,
                    'getComponents' => Arr::first(
                        self::getComponents(),
                        function ($item) use ($field) {
                            return $item->name == 'bs'.$field->type;
                        }
                    ),
                ]); //Select2Sides

                return view()->make('theme::collective.fields.error.err1', ['msg' => '['.$view.']['.$view1.'] NOT EXISTS !!']);
            }

            $view = $view1;
        }
        */
        $comp_field = Arr::first(
            self::getComponents(),
            function ($item) use ($field) {
                return $item->name === 'bs'.$field->type;
            }
        );
        if (null === $comp_field) {
            $msg = 'not registered component [bs'.$field->type.']';

            return view()->make('theme::collective.fields.error.err1', ['msg' => $msg]);
        }

        $view = Str::beforeLast($comp_field->view, '.field').'.freeze';
        if (! View::exists($view)) {
            return view()->make('theme::collective.fields.error.err1', ['msg' => '['.$view.'] NOT EXISTS !!']);
        }

        $view_params = $params;

        $view_params['row'] = $row;
        $view_params['field'] = $field;
        $field->method = Str::camel($field->name);

        if (\is_object($field->value)) {
            $is_collection = ('Illuminate\Database\Eloquent\Collection' === \get_class($field->value));
        } else {
            $is_collection = false;
        }
        if ($is_collection) {
            $rows = $row->{$field->method}(); // cachare tutto per accellerare
            $related = $rows->getRelated();
            // $related=$field->value->first();
            // ///////////////////////////////////
            $params['rows'] = $rows;

            // $view_params['rows']=$rows->get();
            $view_params['rows'] = $field->value;

            $fields_exclude = self::fieldsExcludeRows($rows);
            $related_panel = ThemeService::panelModel($related);
            // 220    Else branch is unreachable because previous condition is always true.
            // if (is_object($related_panel)) {
            $related_fields = $related_panel->fields();
            // } else {
            //    $related_fields = [];
            // }
            $related_fields = collect($related_fields)
                ->filter(
                    function ($item) use ($fields_exclude) {
                        return ! \in_array($item->name, $fields_exclude, true);
                    }
                )
                ->all();

            $related_name = Str::singular($field->name);
            // $view_params['related']=$related->get();
            $view_params['related_name'] = $related_name;
            $view_params['related_fields'] = $related_fields;
            /*
            $url = RouteService::urlRelated([
                'row' => $row,
                'related' => $related,
                'related_name' => $related_name,
                'act' => 'index',
            ]);
            */
            $url = '#';

            $view_params['manage_url'] = $url;

            if (method_exists((object) $rows, 'getPivotClass')) {
                // dddx($rows);
                $pivot_class = $rows->getPivotClass();
                // $pivot = new $pivot_class();
                // dddx($pivot_class);
                $pivot = app($pivot_class);
                /*
                if (is_object($pivot_class)) {
                    $pivot = $pivot_class;
                } else {
                    $pivot = app($pivot_class);
                }
                */

                // dddx($pivot);
                $pivot_panel = ThemeService::panelModel($pivot);
                // ogni tanto ThemeService::panelModel($pivot) rilascia una stringa e non un oggetto
                // ci ho messo una pezza, ma forse dovrebbe aggiornare morph_map?
                if (! \is_object($pivot_panel)) {
                    $pivot_panel = app($pivot_panel);
                    // dddx($pivot_panel);
                }
                $pivot_fields = $pivot_panel->fields();
                $pivot_fields = collect($pivot_fields)->filter(
                    function ($item) use ($fields_exclude) {
                        return ! \in_array($item->name, $fields_exclude, true);
                    }
                )->all();
                $view_params['pivot'] = $pivot;
                $view_params['pivot_panel'] = $pivot_panel;
                $view_params['pivot_fields'] = $pivot_fields;
            }

            // dddx($field->fields);
            // $field->fields=$field->value;
        }

        $field->view = $view;
        $view_params['field'] = $field;

        return view()->make($view, $view_params);
    }

    /**
     * Undocumented function.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Support\HtmlString
     */
    public static function inputHtml(array $params) {
        extract($params);
        if (! isset($field)) {
            throw new \Exception('field is missing');
        }

        $input_type = 'bs'.Str::studly($field->type);
        if (isset($field->sub_type)) {
            $input_type .= Str::studly($field->sub_type);
        }

        $input_name = collect(explode('.', $field->name))->map(
            function ($v, $k) {
                return 0 === $k ? $v : '['.$v.']';
            }
        )->implode('');
        $input_value = (isset($field->value) ? $field->value : null);
        $col_size = isset($field->col_size) ? $field->col_size : 12;
        $field->col_size = $col_size;

        if (! isset($field->attributes) || ! \is_array($field->attributes)) {
            $field->attributes = [];
        }
        $input_attrs = $field->attributes;
        if (isset($field->fields)) {
            $input_attrs['fields'] = $field->fields;
        }
        $div_exludes = ['Hidden', 'Cell'];
        $input_opts = ['field' => $field];
        // if (! in_array($field->type, $div_exludes)) {
        //    return '<div class="col-sm-'.$col_size.'">'.Form::$input_type($input_name, $input_value, $input_attrs, $input_opts).'</div>';
        // }
        // dddx([$field, $input_opts]);
        if (isset($field->label)) {
            $input_attrs['label'] = $field->label;
            // $input_attrs['field'] = $field;
        }

        // return Form::$input_type($input_name, $input_value, $input_attrs, $input_opts);
        // *
        // try {
        // 320    Dead catch - Exception is never thrown in the try block.
        return Form::$input_type($input_name, $input_value, $input_attrs, $input_opts);
        // } catch (\Exception $e) {
            /*
            return '<div style="border:red">
                ERRORE
            </div>';
            */
            /*
            dddx(
                [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    //'methods' => get_class_methods($e),
                    'e' => $e,
                ]
            );
            */
            /*
            return '<div>
                message :'.$e->getMessage().'
                code :'.$e->getCode().'
                file :'.$e->getFile().'
                line :'.$e->getLine().'
                </div>';
            */
        // }
        // */
    }

    public static function btnHtml(array $params): string {
        $class = 'btn btn-primary mb-2';
        $icon = null;       // icona a sx del titolo
        $label = null;
        $data_title = null; // titolo del modal e tooltip
        $title = null;      // stringa che appare nel tasto
        $lang = app()->getLocale();
        $error_label = 'default';
        $tooltip = null;
        extract($params);
        if (! isset($panel)) {
            throw new Exception('panel is missing');
        }
        if (! isset($method)) {
            throw new Exception('method is missing');
        }
        if (! isset($act)) {
            throw new Exception('act is missing');
        }
        if (! isset($url)) {
            throw new Exception('url is missing');
        }

        if (null === $data_title) {
            $data_title = $title;
        }
        $row = $panel->getRow();
        if ('default' === $error_label) {
            $error_label = '['.\get_class($row).']['.$method.']';
        }
        $module_name = getModuleNameFromModel($row);
        if (null === $tooltip) {
            $tooltip = trans(strtolower($module_name.'::'.class_basename($row)).'.btn.'.$data_title);
        }
        // $url = RouteService::urlPanel(['panel' => $panel, 'act' => $act]);
        // $method = Str::camel($act);

        if (\in_array($act, ['destroy', 'delete', 'detach'], true)) {
            $class .= ' btn-danger btn-confirm-delete';
        }

        if (! Gate::allows($method, $panel)) {
            // Strict comparison using === between false and string will always evaluate to false.
            // dddx([$method.'policy non esiste', ! Gate::allows($method, $panel), $method, $panel]);

            return '';
            /*
            if (false == $error_label) {
                return null;
            }
            if ('production' == App::environment()) {
                return null;
            }
            $policy_class = PolicyService::get($panel)->createIfNotExists()->getClass();

            return '['.$policy_class.']['.$method.']';
            */
        }

        if (isset($modal)) {
            // if (strlen((string)$data_title) <1 ) {
            $title = trans($module_name.'::'.strtolower(class_basename($row)).'.act.'.$act);
            // }
        }

        if (isset($guest_url) && ! \Auth::check()) {
            $url = $guest_url;
        }
        if (isset($guest_notice) && $guest_notice && ! \Auth::check()) {
            $url = route('login', ['lang' => $lang, 'referrer' => $url]);
        }

        if (isset($modal)) {
            $url = url_queries(['format' => $modal], $url);
            $target = '';
            switch ($modal) {
            case 'iframe':  $target = 'myModalIframe';
                break;
            case 'ajax':    $target = 'myModalAjax';
                break;
            }

            return
            '<span data-toggle="tooltip" title="'.$tooltip.'">
            <button type="button" data-title="'.$tooltip.'"
            data-href="'.$url.'" data-toggle="modal" class="'.$class.'"
            data-target="#'.$target.'">
            '.$icon.' '.$title.'
            </button>
            </span>';
        }
        // data-href serve per le chiamate ajax
        // dddx($params, $title, $data_title);
        // $title = trans(strtolower($module_name.'::'.class_basename($row)).'.act.'.$title);
        // $data_title = $title;

        return '<a href="'.$url.'"
                    data-href="'.$url.'"
                    data-title="'.$data_title.'"
                    title="'.$title.'"
                    class="'.$class.'"
                    data-toggle="tooltip">
                    '.$icon.' '.$title.'
                </a>';
    }
}// end class
