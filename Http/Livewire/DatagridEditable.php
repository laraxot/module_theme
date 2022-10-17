<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Theme\Services\FieldService;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\RowsContract;
<<<<<<< HEAD
// use Modules\Theme\Traits\HandlesArrays;
// use Modules\Theme\Traits\UploadsFiles;
=======
//use Modules\Theme\Traits\HandlesArrays;
//use Modules\Theme\Traits\UploadsFiles;
>>>>>>> ede0df7 (first)
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\PanelService;

/**
 * Modules\Theme\Http\Livewire\DatagridEditable.
 *
 * @property XotBasePanel $panel
 */
<<<<<<< HEAD
class DatagridEditable extends Component {
    use WithFileUploads;

    // use UploadsFiles;
    // use HandlesArrays;
    // protected $paginationTheme = 'bootstrap';
=======
class DatagridEditable extends Component
{
    use WithFileUploads;

    //use UploadsFiles;
    //use HandlesArrays;
    //protected $paginationTheme = 'bootstrap';
>>>>>>> ede0df7 (first)
    public array $route_params = [];

    public array $data = [];

    public bool $in_admin;

    public int $per_page = 10;

    public int $total;

    public int $page;

    public Collection $rows;

<<<<<<< HEAD
    public function mount(): void {
=======
    public function mount(): void
    {
>>>>>>> ede0df7 (first)
        $this->route_params = getRouteParameters();
        $this->data = request()->all();
        $this->in_admin = inAdmin();
        $this->route_params['in_admin'] = $this->in_admin;
        $this->total = $this->query()->count();
<<<<<<< HEAD
        $this->page = intval(request()->input('page', 1));
        $offset = ($this->page - 1) * $this->per_page;
        $rows = $this->query()->offset((int) $offset)->limit($this->per_page)->get();
        // $rows = collect($rows->toArray());
        // dddx($rows);
        $this->rows = $rows;
        // dddx($this->rows);
    }

    public function rules(): array {
=======
        $this->page = request()->input('page', 1);
        $offset = ($this->page - 1) * $this->per_page;
        $rows = $this->query()->offset((int) $offset)->limit($this->per_page)->get();
        //$rows = collect($rows->toArray());
        //dddx($rows);
        $this->rows = $rows;
        //dddx($this->rows);
    }

    public function rules(): array
    {
>>>>>>> ede0df7 (first)
        $tmp = $this->panel->rules(['act' => 'update']);
        $rules = [];
        foreach ($tmp as $k => $v) {
            $k1 = 'rows.*.'.$k;
            $rules[$k1] = $v;
        }

        return $rules;
    }

<<<<<<< HEAD
    public function getPanelProperty(): PanelContract {
        return PanelService::make()->getByParams($this->route_params);
    }

    public function query(): RowsContract {
=======
    public function getPanelProperty(): PanelContract
    {
        return PanelService::make()->getByParams($this->route_params);
    }

    public function query(): RowsContract
    {
>>>>>>> ede0df7 (first)
        return $this->panel->rows($this->data)->with('post');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.datagrid_editable';
        $view_params = [
            'view' => $view,
        ];

<<<<<<< HEAD
        // dddx($this->rows);
=======
        //dddx($this->rows);
>>>>>>> ede0df7 (first)

        return view()->make($view, $view_params);
    }

    /**
     * @param string $field_name
     * @param string $field_type
     *
     * @return FieldService
     */
<<<<<<< HEAD
    public static function makeField($field_name, $field_type) {
=======
    public static function makeField($field_name, $field_type)
    {
>>>>>>> ede0df7 (first)
        /*
        return FieldService::make($field_name)
                    ->type($field_type)
                    ->setInputComponent('nolabel');
        */
        return (new FieldService())->setName($field_name)->type($field_type)->setInputComponent('nolabel');
    }

    /**
     * @param string $err
     */
<<<<<<< HEAD
    public static function errorMessage($err): string {
=======
    public static function errorMessage($err): string
    {
>>>>>>> ede0df7 (first)
        session()->flash('error_message', $err);

        return $err;
    }

<<<<<<< HEAD
    public function rowsUpdate(): void {
=======
    public function rowsUpdate(): void
    {
>>>>>>> ede0df7 (first)
        $data = $this->validate();
        $data = $data['rows'];
        dddx($data);
        $func = '\Modules\Xot\Jobs\PanelCrud\UpdateJob';
<<<<<<< HEAD
        foreach ($this->rows as $k => $item) {
            /**
             * @var \Illuminate\Database\Eloquent\Model
             */
            $row = $item;
=======
        foreach ($this->rows as $k => $row) {
>>>>>>> ede0df7 (first)
            $func::dispatch($data[$k], PanelService::make()->get($row));
        }
        session()->flash('message', 'Post successfully updated.');
    }

<<<<<<< HEAD
    public function carica(): void {
        dddx(['funzione carica di datatable']);
        // dddx($this->rows);
=======
    public function carica(): void
    {
        dddx(['funzione carica di datatable']);
        //dddx($this->rows);
>>>>>>> ede0df7 (first)
    }
}
