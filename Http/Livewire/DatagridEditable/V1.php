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
// use Modules\Theme\Traits\HandlesArrays;
// use Modules\Theme\Traits\UploadsFiles;
use Modules\Xot\Contracts\RowsContract;
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\PanelService;

/**
 * Modules\Theme\Http\Livewire\DatagridEditable\V1.
 *
 * @property XotBasePanel $panel
 */
class V1 extends Component {
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
        $this->page = (int) (request()->input('page', 1));
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

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.datagrid_editable.v1';
        $view_params = [
            'view' => $view,
        ];

        // dddx($this->rows);

        return view()->make($view, $view_params);
    }

    public static function makeField(string $field_name, string $field_type): FieldService {
        return FieldService::make()->setName($field_name)
            ->setType($field_type)
            ->setInputComponent('nolabel');
    }

    public static function errorMessage(string $err): string {
        session()->flash('error_message', $err);

        return $err;
    }

    public function rowsUpdate(): void {
        $data = $this->validate();
        $data = $data['rows'];

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

    public function carica(string $index, string $file_name, string $file_type, array $data): void {
        // dddx(['index' => $index, 'file_name' => $file_name, 'file_type' => $file_type]);
        // dddx('funzione carica di row');
        // $this->set($index, $file_name);
        // $index = rows.0.img
        $tmp = explode('.', $index);
        $file_name_full = '/uploads/gallery/'.$file_name;

        $this->rows[$tmp[1]]->{$tmp[2]} = $file_name_full;
        /*
        $this->rows->map(function($item,$key){

        });
        */

        // dddx(['rows' => $this->rows]);
        // dddx($this->form_data['tmp']);
        $img = Image::make($data);

        $path = Storage::disk('public_html')->path($file_name_full);

        $img->save($path, 75); // 75 quality
    }
}
