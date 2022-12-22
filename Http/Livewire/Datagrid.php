<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Cms\Contracts\PanelContract;
use Modules\Theme\Services\ThemeService;
use Modules\Cms\Contracts\PanelContract;

// use Modules\Cart\Models\BookingItem;

/**
 * full calendar
 * https://github.com/asantibanez/livewire-calendar
 * https://github.com/stijnvanouplines/livewire-calendar/blob/master/app/Http/Livewire/Calendar.php.
 */
class Datagrid extends Component {
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public \Illuminate\Support\Collection $index_fields; // private lo perde,protected anche

    public string $sql = '';

    public string $where = '';

    public string $model_class;

    /**
     * Livewire component's [modules.form-x.http.livewire.datagrid] public property [rows] must be of type: [numeric, string, array, null, or boolean]. Only protected or private properties can be set as other types because JavaScript doesn't need to access them.
     *
     * @param PanelContract $_panel
     *
     * @return void
     */
    public function mount($_panel) {
        $this->model_class = \get_class($_panel->getRow());
        $index_fields = $_panel->getFields(['act' => 'index']);
        $this->index_fields = $index_fields;
        $rows = $_panel->getRows();
        // 42     Call to an undefined method Illuminate\Database\Eloquent\Builder|Illuminate\Database\Eloquent\Relations\Relation::toSql().
        if (! method_exists($rows, 'toSql')) {
            throw new \Exception('in ['.\get_class($rows).'] method [toSql] is missing ['.__LINE__.']['.__FILE__.']');
        }
        if (! method_exists($rows, 'getBindings')) {
            throw new \Exception('in ['.\get_class($rows).'] method [getBindings] is missing ['.__LINE__.']['.__FILE__.']');
        }

        $sql = $rows->toSql();
        // if (is_array($sql)) {
        //    throw new \Exception('sql is an array ['.__LINE__.']['.__FILE__.']');
        // }
        /**
         * @var array
         */
        $rows_bindings = $rows->getBindings();
        $bindings = collect($rows_bindings)
            ->map(
                function ($item) {
                    return "'".$item."'";
                }
            )->all();
        $sql = str_replace(explode(',', str_repeat('?,', 10)), $bindings, $sql);
        if (\is_array($sql)) {
            $sql = implode(' ', $sql);
        }
        $this->sql = $sql;
        /*

        $sql = str_replace(['?'], ['\'%s\''], $sql);
        $sql = vsprintf($sql, $bindings);

        */
        if (Str::contains($this->sql, ' where ')) {
            $this->where = Str::after($this->sql, 'where');
        }
    }

    /*
    public function printf_array($format, $arr) {
        return call_user_func_array('printf', array_merge((array) $format, $arr));
    }
    */

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.datagrid';
        $model = app($this->model_class);
        $join_on = '';
        $join_table = '';

        $select = Str::between($this->sql, 'select', 'from');
        $join = '';
        if (Str::contains($this->sql, 'join')) {
            $join = Str::between($this->sql, 'join', 'where');
            $join_table = trim(Str::before($join, 'on'));
            $join_table = str_replace(['`'], [''], $join_table);
            $join_on = trim(Str::after($join, 'on'));
        }
        $where = '';
        if (Str::contains($this->sql, 'where')) {
            $where = Str::between($this->sql, 'where', 'limit');
        }

        $rows = $model->newQuery();
        $rows = $rows->selectRaw($select);
        if ('' !== $join) {
            $rows = $rows->join(
                $join_table,
                function ($query) use ($join_on) {
                    $query->whereRaw($join_on);
                }
            );
        }
        if ('' !== $where) {
            $rows = $rows->whereRaw($where);
        }
        $rows = $rows->paginate(10);

        $view_params = [
            'rows' => $rows,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * @return string
     */
    public function getView() {
        // no di themeservice, perche' livewire
        $mod_name = Str::between(__CLASS__, 'Modules\\', '\\Http\\');
        $mod_name_low = strtolower($mod_name);
        $name = Str::after(__CLASS__, '\Http\Livewire\\');
        $name = str_replace('\\', '.', $name);
        $name = Str::snake($name);
        $view = $mod_name_low.'::livewire.'.$name;

        return $view;
    }
}