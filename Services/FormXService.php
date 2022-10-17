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
<<<<<<< HEAD
// ---- services ---
=======
//---- services ---
>>>>>>> ede0df7 (first)
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Modules\Cms\Services\RouteService;
use Modules\Theme\Contracts\FieldContract;
use Modules\Xot\Services\PolicyService;
=======
use Modules\Xot\Services\PolicyService;
use Modules\Xot\Services\RouteService;
>>>>>>> ede0df7 (first)

/**
 * Class FormXService.
 */
<<<<<<< HEAD
class FormXService {
=======
class FormXService
{
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public static function getComponents(): array {
=======
    public static function getComponents(): array
    {
>>>>>>> ede0df7 (first)
        $view_path = __DIR__.'/../Resources/views/collective/fields';
        $namespace = '';
        $prefix = 'theme::';

        return CollectiveService::getComponents($view_path, $namespace, $prefix);
    }

    /**
     * @param BelongsTo|HasManyThrough|HasOneOrMany|BelongsToMany|MorphOneOrMany|MorphPivot|MorphTo|MorphToMany $rows
     */
<<<<<<< HEAD
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
=======
    public static function fieldsExcludeRows($rows): array
    {
        $fields_exclude = [];

        array_push($fields_exclude, 'id');

        if (method_exists($rows, 'getForeignKeyName')) {
            array_push($fields_exclude, $rows->getForeignKeyName());
        }
        if (method_exists($rows, 'getForeignPivotKeyName')) {
            array_push($fields_exclude, $rows->getForeignPivotKeyName());
        }
        if (method_exists($rows, 'getRelatedPivotKeyName')) {
            array_push($fields_exclude, $rows->getRelatedPivotKeyName());
        }
        if (method_exists($rows, 'getMorphType')) {
            array_push($fields_exclude, $rows->getMorphType());
        }
        array_push($fields_exclude, 'related_type'); //-- ??
>>>>>>> ede0df7 (first)

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

<<<<<<< HEAD
    // ret \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string|void

    public static function inputFreeze(array $params): Renderable {
=======
    //ret \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string|void

    public static function inputFreeze(array $params): Renderable
    {
>>>>>>> ede0df7 (first)
        extract($params);
        if (! isset($field)) {
            throw new \Exception('field is missing');
        }
        if (! isset($row)) {
            throw new \Exception('row is missing');
        }

        $field->name_dot = bracketsToDotted($field->name);

<<<<<<< HEAD
        if (\in_array('value', array_keys($params), true)) {
=======
        if (in_array('value', array_keys($params))) {
>>>>>>> ede0df7 (first)
            $field->value = $params['value'];
        } else {
            try {
                $field->value = Arr::get($row, $field->name_dot);
<<<<<<< HEAD
                if (null === $field->value) {
                    $field->value = Arr::get((array) $row, $field->name_dot);
                }
                // $field->value = $row->{$field->name_dot};
                // $field->value = 'test['.$field->name_dot.']'.Arr::get($row, 'nome_diri');
=======
                if (null == $field->value) {
                    $field->value = Arr::get((array) $row, $field->name_dot);
                }
                //$field->value = $row->{$field->name_dot};
                //$field->value = 'test['.$field->name_dot.']'.Arr::get($row, 'nome_diri');
>>>>>>> ede0df7 (first)
            } catch (\Exception $e) {
                $field->value = '---['.$field->name_dot.']['.$e->getMessage().']['.__LINE__.'-'.basename(__FILE__).']['.$row->{$field->name_dot}.']--';
            }
        }

<<<<<<< HEAD
        // return '['.__LINE__.__FILE__.']';
=======
        //return '['.__LINE__.__FILE__.']';
>>>>>>> ede0df7 (first)

        if (isset($label)) {
            $field->label = $label;
        }

        $tmp = Str::snake($field->type);

<<<<<<< HEAD
        /*
        * @phpstan-var view-string

        $view = 'theme::includes.components.input.'.$tmp.'.freeze';
        */
        /*
        /*

=======
        //$view = 'theme::includes.components.input.'.$tmp.'.freeze';
        /*
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        /**
         * --- da fare contratto etc etc (interface).
         *
         * @var FieldContract
         */
        $comp_field = Arr::first(
            self::getComponents(),
            function ($item) use ($field) {
                return $item->name === 'bs'.$field->type;
=======
        $comp_field = Arr::first(
            self::getComponents(),
            function ($item) use ($field) {
                return $item->name == 'bs'.$field->type;
>>>>>>> ede0df7 (first)
            }
        );
        if (null == $comp_field) {
            $msg = 'not registered component [bs'.$field->type.']';

            return view()->make('theme::collective.fields.error.err1', ['msg' => $msg]);
        }

<<<<<<< HEAD
        $view = Str::beforeLast((string) $comp_field->view, '.field').'.freeze';
=======
        $view = Str::beforeLast($comp_field->view, '.field').'.freeze';
>>>>>>> ede0df7 (first)
        if (! View::exists($view)) {
            return view()->make('theme::collective.fields.error.err1', ['msg' => '['.$view.'] NOT EXISTS !!']);
        }

        $view_params = $params;

        $view_params['row'] = $row;
        $view_params['field'] = $field;
        $field->method = Str::camel($field->name);

<<<<<<< HEAD
        if (\is_object($field->value)) {
            $is_collection = ('Illuminate\Database\Eloquent\Collection' === \get_class($field->value));
=======
        if (is_object($field->value)) {
            $is_collection = ('Illuminate\Database\Eloquent\Collection' == get_class($field->value));
>>>>>>> ede0df7 (first)
        } else {
            $is_collection = false;
        }
        if ($is_collection) {
<<<<<<< HEAD
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
=======
            $rows = $row->{$field->method}(); //cachare tutto per accellerare
            $related = $rows->getRelated();
            //$related=$field->value->first();
            /////////////////////////////////////
            $params['rows'] = $rows;

            //$view_params['rows']=$rows->get();
            $view_params['rows'] = $field->value;

            $fields_exclude = FormXService::fieldsExcludeRows($rows);
            $related_panel = ThemeService::panelModel($related);
            //220    Else branch is unreachable because previous condition is always true.
            //if (is_object($related_panel)) {
            $related_fields = $related_panel->fields();
            //} else {
            //    $related_fields = [];
            //}
            $related_fields = collect($related_fields)
                ->filter(
                    function ($item) use ($fields_exclude) {
                        return ! in_array($item->name, $fields_exclude);
>>>>>>> ede0df7 (first)
                    }
                )
                ->all();

            $related_name = Str::singular($field->name);
<<<<<<< HEAD
            // $view_params['related']=$related->get();
=======
            //$view_params['related']=$related->get();
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
                // dddx($rows);
                $pivot_class = $rows->getPivotClass();
                if (! Str::startsWith($pivot_class, 'Modules\\')) {
                    $pivot1 = implode('\\', array_slice(explode('\\', get_class($rows->getRelated())), 0, -1)).'\\';
                    $pivot1 .= Str::studly(Str::singular($rows->getTable()));

                    if (! class_exists($pivot1)) {
                        dddx(
                            [
                                // 'rows' => $rows,
                                'pivot_class' => $pivot_class,
                                'related' => $rows->getRelated(),
                                'getMorphClass' => $rows->getMorphClass(),
                                'getMorphType' => $rows->getMorphType(),
                                'table' => $rows->getTable(),
                                'methods' => get_class_methods($rows),
                                'pivot1' => $pivot1,
                                'pivot1_exists' => class_exists($pivot1),
                            ]
                        );
                    }
                    $pivot_class = $pivot1;
                }
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
=======
                $pivot_class = $rows->getPivotClass();
                //$pivot = new $pivot_class();
                $pivot = app($pivot_class);
                $pivot_panel = ThemeService::panelModel($pivot);
                //ogni tanto ThemeService::panelModel($pivot) rilascia una stringa e non un oggetto
                //ci ho messo una pezza, ma forse dovrebbe aggiornare morph_map?
                if (! is_object($pivot_panel)) {
                    $pivot_panel = app($pivot_panel);
                    //dddx($pivot_panel);
>>>>>>> ede0df7 (first)
                }
                $pivot_fields = $pivot_panel->fields();
                $pivot_fields = collect($pivot_fields)->filter(
                    function ($item) use ($fields_exclude) {
<<<<<<< HEAD
                        return ! \in_array($item->name, $fields_exclude, true);
=======
                        return ! in_array($item->name, $fields_exclude);
>>>>>>> ede0df7 (first)
                    }
                )->all();
                $view_params['pivot'] = $pivot;
                $view_params['pivot_panel'] = $pivot_panel;
                $view_params['pivot_fields'] = $pivot_fields;
            }

<<<<<<< HEAD
            // dddx($field->fields);
            // $field->fields=$field->value;
=======
            //dddx($field->fields);
            //$field->fields=$field->value;
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public static function inputHtml(array $params) {
=======
    public static function inputHtml(array $params)
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
                return 0 === $k ? $v : '['.$v.']';
=======
                return 0 == $k ? $v : '['.$v.']';
>>>>>>> ede0df7 (first)
            }
        )->implode('');
        $input_value = (isset($field->value) ? $field->value : null);
        $col_size = isset($field->col_size) ? $field->col_size : 12;
        $field->col_size = $col_size;

<<<<<<< HEAD
        if (! isset($field->attributes) || ! \is_array($field->attributes)) {
=======
        if (! isset($field->attributes) || ! is_array($field->attributes)) {
>>>>>>> ede0df7 (first)
            $field->attributes = [];
        }
        $input_attrs = $field->attributes;
        if (isset($field->fields)) {
            $input_attrs['fields'] = $field->fields;
        }
        $div_exludes = ['Hidden', 'Cell'];
        $input_opts = ['field' => $field];
<<<<<<< HEAD
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
=======
        //if (! in_array($field->type, $div_exludes)) {
        //    return '<div class="col-sm-'.$col_size.'">'.Form::$input_type($input_name, $input_value, $input_attrs, $input_opts).'</div>';
        //}
        //dddx([$field, $input_opts]);
        if (isset($field->label)) {
            $input_attrs['label'] = $field->label;
            //$input_attrs['field'] = $field;
        }

        //return Form::$input_type($input_name, $input_value, $input_attrs, $input_opts);
        //*
        //try {
        //320    Dead catch - Exception is never thrown in the try block.
        return Form::$input_type($input_name, $input_value, $input_attrs, $input_opts);
        //} catch (\Exception $e) {
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
        //}
        //*/
    }

    public static function btnHtml(array $params): string
    {
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
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
=======
        if (null == $data_title) {
            $data_title = $title;
        }
        $row = $panel->getRow();
        if ('default' == $error_label) {
            $error_label = '['.get_class($row).']['.$method.']';
        }
        $module_name = getModuleNameFromModel($row);
        if (null == $tooltip) {
            $tooltip = trans(strtolower($module_name.'::'.class_basename($row)).'.btn.'.$data_title);
        }
        //$url = RouteService::urlPanel(['panel' => $panel, 'act' => $act]);
        //$method = Str::camel($act);

        if (in_array($act, ['destroy', 'delete', 'detach'])) {
>>>>>>> ede0df7 (first)
            $class .= ' btn-danger btn-confirm-delete';
        }

        if (! Gate::allows($method, $panel)) {
<<<<<<< HEAD
            // Strict comparison using === between false and string will always evaluate to false.
            // dddx([$method.'policy non esiste', ! Gate::allows($method, $panel), $method, $panel]);
=======
            //Strict comparison using === between false and string will always evaluate to false.
            //dddx([$method.'policy non esiste', ! Gate::allows($method, $panel), $method, $panel]);
>>>>>>> ede0df7 (first)

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
<<<<<<< HEAD
            // if (strlen((string)$data_title) <1 ) {
            $title = trans($module_name.'::'.strtolower(class_basename($row)).'.act.'.$act);
            // }
=======
            if ('' == $data_title) {
                $title = trans($module_name.'::'.strtolower(class_basename($row)).'.act.'.$act);
            }
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
                case 'iframe':  $target = 'myModalIframe';
                    break;
                case 'ajax':    $target = 'myModalAjax';
                    break;
=======
            case 'iframe':  $target = 'myModalIframe';
                break;
            case 'ajax':    $target = 'myModalAjax';
                break;
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
        // dddx($params, $title, $data_title);
        // $title = trans(strtolower($module_name.'::'.class_basename($row)).'.act.'.$title);
        // $data_title = $title;
=======
        //dddx($params, $title, $data_title);
        //$title = trans(strtolower($module_name.'::'.class_basename($row)).'.act.'.$title);
        //$data_title = $title;
>>>>>>> ede0df7 (first)

        return '<a href="'.$url.'"
                    data-href="'.$url.'"
                    data-title="'.$data_title.'"
                    title="'.$title.'"
                    class="'.$class.'"
                    data-toggle="tooltip">
                    '.$icon.' '.$title.'
                </a>';
    }
<<<<<<< HEAD
}// end class
=======
}//end class
>>>>>>> ede0df7 (first)
