<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\DatagridEditable;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
<<<<<<< HEAD
// use Modules\Theme\Traits\UploadsFiles;

use Modules\Theme\Contracts\FieldContract;
use Modules\Theme\Services\FieldService;
=======
use Modules\Theme\Services\FieldService;
//use Modules\Theme\Traits\UploadsFiles;

>>>>>>> ede0df7 (first)
use Modules\Theme\Traits\HandlesArrays;
use Modules\Xot\Http\Livewire\XotBaseComponent;
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\PanelService;

/**
 * Modules\Theme\Http\Livewire\DatagridEditable\Row.
 *
 * @property XotBasePanel $panel
 */
<<<<<<< HEAD
class Row extends XotBaseComponent {
    use HandlesArrays;
    // use UploadsFiles;
    use WithFileUploads;
=======
class Row extends XotBaseComponent
{
    use WithFileUploads;
    //use UploadsFiles;
    use HandlesArrays;
>>>>>>> ede0df7 (first)

    public array $index_fields = [];

    public array $route_params = [];

    public array $data = [];

    public bool $in_admin;

    public mixed $row;

    public string $index;

    public array $form_data = [];

    public array $rows = [];

    /**
     * @param \Illuminate\Database\Eloquent\Model|null $row
     * @param string                                   $index
     */
<<<<<<< HEAD
    public function mount($row, $index): void {
        $this->route_params = getRouteParameters();
=======
    public function mount($row, $index): void
    {
        $this->route_params = optional(request()->route())->parameters();
>>>>>>> ede0df7 (first)
        $this->data = request()->all();
        $this->in_admin = inAdmin();
        $this->route_params['in_admin'] = $this->in_admin;

        $this->row = $row;
        $this->index = $index;
<<<<<<< HEAD
        // $this->fields = $fields;
        $this->setFormProperties($row);
    }

    public function rules(): array {
=======
        //$this->fields = $fields;
        $this->setFormProperties($row);
    }

    public function rules(): array
    {
>>>>>>> ede0df7 (first)
        $tmp = $this->panel->rules(['act' => 'update']);
        $rules = [];
        foreach ($tmp as $k => $v) {
            $k1 = 'form_data.'.$k;
            $rules[$k1] = $v;
        }

        return $rules;
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
    public function fields(): array {
        /**
         * @var Collection<FieldContract>
         */
=======
    public function fields(): array
    {
>>>>>>> ede0df7 (first)
        $panel_fields = $this->panel->getFields(['act' => 'index']);

        $fields = [];
        foreach ($panel_fields as $field) {
            $fields[] = FieldService::make()
<<<<<<< HEAD
                ->setName((string) $field->name)
                ->setType((string) $field->type)
                ->setInputComponent('nolabel')
                // ->set('form_data',$this->)
            ;
=======
                ->setName($field->name)
                ->setType($field->type)
                ->setInputComponent('nolabel')
                //->set('form_data',$this->)
                ;
>>>>>>> ede0df7 (first)
        }

        return $fields;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Response|mixed|null
     */
<<<<<<< HEAD
    public function getPanelProperty() {
        return PanelService::make()->getByParams($this->route_params);
    }

    // *

    public function setFormProperties(?Model $model = null): void {
        // $this->model = $model;
=======
    public function getPanelProperty()
    {
        return PanelService::make()->getByParams($this->route_params);
    }

    //*

    public function setFormProperties(?Model $model = null): void
    {
        //$this->model = $model;
>>>>>>> ede0df7 (first)
        if ($model) {
            $this->form_data = $model->toArray();
        }

        foreach ($this->fields() as $field) {
            if (! isset($this->form_data[$field->name])) {
<<<<<<< HEAD
                $array = \in_array($field->type, ['checkbox', 'file'], true);
=======
                $array = in_array($field->type, ['checkbox', 'file']);
>>>>>>> ede0df7 (first)
                $this->form_data[$field->name] = $field->default ?? ($array ? [] : null);
                if (Str::contains($field->name, '.')) {
                    [$rel,$rel_field] = explode('.', $field->name);

                    $rel_val = '';
<<<<<<< HEAD
                    /* try { */
=======
                    /*try {*/
>>>>>>> ede0df7 (first)
                    $rel_val = $model->$rel->$rel_field;
                    /* } catch (\Exception $e) {
                     }*/
                    $this->form_data[$field->name] = $rel_val;
                }
            }
        }
<<<<<<< HEAD
        $this->rows[$this->index] = $this->form_data; // ???
    }

    // */

    public function render(): Renderable {
=======
        $this->rows[$this->index] = $this->form_data; //???
    }

    //*/

    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = $this->getView();
        $view_params = [
            'view' => $view,
            'form_data' => $this->form_data,
            'fields' => $this->fields(),
        ];
<<<<<<< HEAD
        // dddx(['view' => $view, 'view_params' => $view_params]);
=======
        //dddx(['view' => $view, 'view_params' => $view_params]);
>>>>>>> ede0df7 (first)

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function rowUpdate(): void {
        $data = $this->validate();
        $data = $data['form_data'];
        $func = '\Modules\Xot\Jobs\PanelCrud\UpdateJob';
        // $func::dispatchNow($data, $this->panel);
=======
    public function rowUpdate(): void
    {
        $data = $this->validate();
        $data = $data['form_data'];
        $func = '\Modules\Xot\Jobs\PanelCrud\UpdateJob';
        //$func::dispatchNow($data, $this->panel);
>>>>>>> ede0df7 (first)

        session()->flash('message', 'Post successfully updated.');
    }

    /**
     * @param string $index
     * @param string $file_name
     * @param string $file_type
     * @param array  $data
     */
<<<<<<< HEAD
    public function carica($index, $file_name, $file_type, $data): void {
        // dddx('funzione carica di row');

        // dddx($this->form_data['tmp']);
=======
    public function carica($index, $file_name, $file_type, $data): void
    {
        //dddx('funzione carica di row');

        //dddx($this->form_data['tmp']);
>>>>>>> ede0df7 (first)
        $img = Image::make($data);

        $path = Storage::disk('public_html')->path('/uploads/gallery/'.$file_name);

<<<<<<< HEAD
        $img->save($path, 75); // 75 quality
=======
        $img->save($path, 75); //75 quality
>>>>>>> ede0df7 (first)
    }

    /**
     * @param mixed $a
     */
<<<<<<< HEAD
    public function updated($a): void {
=======
    public function updated($a): void
    {
>>>>>>> ede0df7 (first)
        dddx($a);
    }
}
