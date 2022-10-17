<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\DatagridEditable;

/*
 * griglia che salva tutte le righe con il submit unico
 */

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Theme\Services\FieldService;
use Modules\Xot\Contracts\PanelContract;
<<<<<<< HEAD
// use Modules\Theme\Traits\HandlesArrays;
// use Modules\Theme\Traits\UploadsFiles;
=======
//use Modules\Theme\Traits\HandlesArrays;
//use Modules\Theme\Traits\UploadsFiles;
>>>>>>> ede0df7 (first)
use Modules\Xot\Contracts\RowsContract;
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\PanelService;

/**
 * Modules\Theme\Http\Livewire\DatagridEditable\V1.
 *
 * @property XotBasePanel $panel
 */
<<<<<<< HEAD
class V1 extends Component {
    use WithFileUploads;

    // use UploadsFiles;
    // use HandlesArrays;
    // protected $paginationTheme = 'bootstrap';
=======
class V1 extends Component
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
        $this->route_params = getRouteParameters();
=======
    public function mount(): void
    {
        $this->route_params = optional(request()->route())->parameters();
>>>>>>> ede0df7 (first)
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
        return $this->panel->rows($this->data)->with('post');
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function getPanelProperty(): PanelContract
    {
        return PanelService::make()->getByParams($this->route_params);
    }

    public function query(): RowsContract
    {
        return $this->panel->rows($this->data)->with('post');
    }

    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.datagrid_editable.v1';
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

<<<<<<< HEAD
    public static function makeField(string $field_name, string $field_type): FieldService {
=======
    public static function makeField(string $field_name, string $field_type): FieldService
    {
>>>>>>> ede0df7 (first)
        return FieldService::make()->setName($field_name)
            ->setType($field_type)
            ->setInputComponent('nolabel');
    }

<<<<<<< HEAD
    public static function errorMessage(string $err): string {
=======
    public static function errorMessage(string $err): string
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
    public function carica(string $index, string $file_name, string $file_type, array $data): void {
        // dddx(['index' => $index, 'file_name' => $file_name, 'file_type' => $file_type]);
        // dddx('funzione carica di row');
        // $this->set($index, $file_name);
        // $index = rows.0.img
=======
    public function carica(string $index, string $file_name, string $file_type, array $data): void
    {
        //dddx(['index' => $index, 'file_name' => $file_name, 'file_type' => $file_type]);
        //dddx('funzione carica di row');
        //$this->set($index, $file_name);
        //$index = rows.0.img
>>>>>>> ede0df7 (first)
        $tmp = explode('.', $index);
        $file_name_full = '/uploads/gallery/'.$file_name;

        $this->rows[$tmp[1]]->{$tmp[2]} = $file_name_full;
        /*
        $this->rows->map(function($item,$key){

        });
        */

<<<<<<< HEAD
        // dddx(['rows' => $this->rows]);
        // dddx($this->form_data['tmp']);
=======
        //dddx(['rows' => $this->rows]);
        //dddx($this->form_data['tmp']);
>>>>>>> ede0df7 (first)
        $img = Image::make($data);

        $path = Storage::disk('public_html')->path($file_name_full);

<<<<<<< HEAD
        $img->save($path, 75); // 75 quality
=======
        $img->save($path, 75); //75 quality
>>>>>>> ede0df7 (first)
    }
}
