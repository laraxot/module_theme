<?php

declare(strict_types=1);

namespace Modules\Theme\Services;

/*
*  https://github.com/kdion4891/laravel-livewire-tables/blob/master/src/Column.php
*
**/

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @property string   $heading
 * @property string   $attribute
 * @property bool     $searchable
 * @property bool     $sortable
 * @property callable $sortCallback
 * @property string   $view
 */
class ColumnService
{
    protected string $heading;

    protected string $attribute;

    protected string $type;

    protected bool $searchable = false;

    protected bool $sortable = false;
    // se lo metto davanti alla variabile
    // \Services\ColumnService::$sortCallback cannot have type callable
    /**
     * Undocumented variable.
     *
     * @var callable
     */
    protected $sortCallback;

    protected string $view;

    // private static $instance = null;

    /**
     * ColumnService constructor.
     *
     * @param string $heading
     * @param string $attribute
     */
    public function __construct($heading, $attribute)
    {
        $this->heading = $heading;
        // 54     Variable $attribute on left side of ?? always exists and is not nullable.
        $this->attribute = $attribute; // ?? Str::snake(Str::lower($heading));
    }

    public function __get($property)
    {
        return $this->$property;
    }

    /*
    Unsafe usage of new static().
         💡 Consider making the class or the constructor final.
    */

    /**
     * @param string $heading
     * @param string $attribute
     *
     * @return ColumnService
     */
    public static function make($heading = '', $attribute = '')
    {
        return new self($heading, $attribute);
    }

    /**
     * @param string $type
     */
    public function type($type): self
    {
        $this->type = $type;

        return $this;
    }

    public function searchable(): self
    {
        $this->searchable = true;

        return $this;
    }

    public function sortable(): self
    {
        $this->sortable = true;

        return $this;
    }

    public function sortUsing(callable $callback): self
    {
        $this->sortCallback = $callback;

        return $this;
    }

    /**
     * @param string $view
     *
     * @return $this
     */
    public function view($view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function freeze(Model $model)
    {
        $value = Arr::get($model->toArray(), $this->attribute);
        $type = Str::snake($this->type);
        $start = 'theme::livewire.fields.';

        $views = [];
        $pieces = explode('_', $type);
        $pieces_count = \count($pieces);
        for ($i = $pieces_count; $i > 0; --$i) {
            $a = \array_slice($pieces, 0, $i);
            $b = \array_slice($pieces, $i);
            $views[] = $start.implode('_', $a).'.'.implode('_', array_merge(['freeze'], $b));
        }
        $view = collect($views)->first(
            function ($view_check) {
                return \View::exists($view_check);
            }
        );
        if (null === $view) {
            $ddd_msg =
                [
                    'err' => 'Not Exists ..',
                    'line' => __LINE__,
                    'file' => __FILE__,
                    'pub_theme' => config('xra.pub_theme'),
                    'adm_theme' => config('xra.adm_theme'),
                    // 'view0_dir' => self::viewNamespaceToDir($views[0]),
                    'views' => $views,
                ];
            dddx($ddd_msg);
        }

        // dddx(\View::first($views));
        $view_params = [
            'view' => $view,
            'row' => $model,
            'value' => $value,
            // 'field' => $this,
        ];

        if (null === $view) {
            throw new \Exception('view is null');
        }

        return view()->make($view, $view_params);

        // return $value;
    }
}
