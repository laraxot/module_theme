<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\DatagridEditable;

use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
<<<<<<< HEAD
use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Cms\Services\PanelService;
// use Modules\Theme\Traits\HandlesArrays;
// use Modules\Theme\Traits\UploadsFiles;
use Modules\Theme\Services\FieldService;
use Modules\Xot\Contracts\RowsContract;
=======
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Theme\Services\FieldService;
use Modules\Xot\Contracts\PanelContract;
// use Modules\Theme\Traits\HandlesArrays;
// use Modules\Theme\Traits\UploadsFiles;
use Modules\Xot\Contracts\RowsContract;
use Modules\Xot\Services\PanelService;
>>>>>>> a909dfc0 (up)

/**
 * Modules\Theme\Http\Livewire\DatagridEditable\V2.
 *
 * @property XotBasePanel $panel
 */
class V2 extends Component {
    use WithFileUploads;

    // use UploadsFiles;
    // use HandlesArrays;
    // protected $paginationTheme = 'bootstrap';
    public array $route_params = [];

    public array $data = [];

    public bool $in_admin;

    public int $per_page = 10;

    public int $total;

    public int $page;

    public Collection $rows;

    public function mount(): void {
        $this->route_params = getRouteParameters();
        $this->data = request()->all();
        $this->in_admin = inAdmin();
        $this->route_params['in_admin'] = $this->in_admin;
        $this->total = $this->query()->count();
        $page = (int) request()->input('page', 1);
        $this->page = $page;
        $offset = ($this->page - 1) * $this->per_page;
        $rows = $this->query()->offset((int) $offset)->limit($this->per_page)->get();
        // $rows = collect($rows->toArray());
        // dddx($rows);
        $this->rows = $rows;
        // dddx($this->rows);
    }

    public function rules(): array {
        $tmp = $this->panel->rules(['act' => 'update']);
        $rules = [];
        foreach ($tmp as $k => $v) {
            $k1 = 'rows.*.'.$k;
            $rules[$k1] = $v;
        }

        return $rules;
    }

    public function getPanelProperty(): PanelContract {
        return PanelService::make()->getByParams($this->route_params);
    }

    public function query(): RowsContract {
        return $this->panel->rows($this->data)->with('post');
    }

    public function render(): ViewContract {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.datagrid_editable.v2';
        $view_params = [
            'view' => $view,
        ];

        // dddx($this->rows);
        // Parameter #1 $view of function view expects view-string|null, string given.
        return view()->make($view, $view_params);
    }

    /**
     * @param string $field_name
     * @param string $field_type
     *
     * @return FieldService
     */
    public static function makeField($field_name, $field_type) {
        return FieldService::make()
            ->setName($field_name)
            ->setType($field_type)
            ->setInputComponent('nolabel');
    }

    /**
     * @param string $err
     */
    public static function errorMessage($err): string {
        session()->flash('error_message', $err);

        return $err;
    }

    public function rowsUpdate(): void {
        $data = $this->validate();
        $data = $data['rows'];
        dddx($data);
        $func = '\Modules\Xot\Jobs\PanelCrud\UpdateJob';
        foreach ($this->rows as $k => $item) {
            /**
             * @var \Illuminate\Database\Eloquent\Model
             */
            $row = $item;
            $func::dispatch($data[$k], PanelService::make()->get($row));
        }
        session()->flash('message', 'Post successfully updated.');
    }

    public function carica(): void {
        dddx(['funzione carica di datatable']);
        // dddx($this->rows);
    }
}
