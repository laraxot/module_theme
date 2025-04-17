<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\DatagridEditable;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
// use Modules\Theme\Traits\UploadsFiles;

use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Cms\Services\PanelService;
use Modules\Theme\Contracts\FieldContract;
use Modules\Theme\Services\FieldService;
use Modules\Theme\Traits\HandlesArrays;
use Modules\Xot\Http\Livewire\XotBaseComponent;

/**
 * Modules\Theme\Http\Livewire\DatagridEditable\Row.
 *
 * @property XotBasePanel $panel
 */
class Row extends XotBaseComponent
{
    use HandlesArrays;
    // use UploadsFiles;
    use WithFileUploads;

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
    public function mount($row, $index): void
    {
        $this->route_params = getRouteParameters();
        $this->data = request()->all();
        $this->in_admin = inAdmin();
        $this->route_params['in_admin'] = $this->in_admin;

        $this->row = $row;
        $this->index = $index;
        // $this->fields = $fields;
        $this->setFormProperties($row);
    }

    public function rules(): array
    {
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
    public static function errorMessage($err): string
    {
        session()->flash('error_message', $err);

        return $err;
    }

    public function fields(): array
    {
        /**
         * @var Collection<FieldContract>
         */
        $panel_fields = $this->panel->getFields(['act' => 'index']);

        $fields = [];
        foreach ($panel_fields as $field) {
            $fields[] = FieldService::make()
                ->setName((string) $field->name)
                ->setType((string) $field->type)
                ->setInputComponent('nolabel')
                // ->set('form_data',$this->)
            ;
        }

        return $fields;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Response|mixed|null
     */
    public function getPanelProperty()
    {
        return PanelService::make()->getByParams($this->route_params);
    }

    // *

    public function setFormProperties(Model $model = null): void
    {
        // $this->model = $model;
        if ($model) {
            $this->form_data = $model->toArray();
        }

        foreach ($this->fields() as $field) {
            if (! isset($this->form_data[$field->name])) {
                $array = \in_array($field->type, ['checkbox', 'file'], true);
                $this->form_data[$field->name] = $field->default ?? ($array ? [] : null);
                if (Str::contains($field->name, '.')) {
                    [$rel,$rel_field] = explode('.', $field->name);

                    $rel_val = '';
                    /* try { */
                    $rel_val = $model->$rel->$rel_field;
                    /* } catch (\Exception $e) {
                     }*/
                    $this->form_data[$field->name] = $rel_val;
                }
            }
        }
        $this->rows[$this->index] = $this->form_data; // ???
    }

    // */

    public function render(): Renderable
    {
        $view = $this->getView();
        $view_params = [
            'view' => $view,
            'form_data' => $this->form_data,
            'fields' => $this->fields(),
        ];
        // dddx(['view' => $view, 'view_params' => $view_params]);

        return view()->make($view, $view_params);
    }

    public function rowUpdate(): void
    {
        $data = $this->validate();
        $data = $data['form_data'];
        $func = '\Modules\Xot\Jobs\PanelCrud\UpdateJob';
        // $func::dispatchNow($data, $this->panel);

        session()->flash('message', 'Post successfully updated.');
    }

    /**
     * @param string $index
     * @param string $file_name
     * @param string $file_type
     * @param array  $data
     */
    public function carica($index, $file_name, $file_type, $data): void
    {
        // dddx('funzione carica di row');

        // dddx($this->form_data['tmp']);
        $img = Image::make($data);

        $path = Storage::disk('public_html')->path('/uploads/gallery/'.$file_name);

        $img->save($path, 75); // 75 quality
    }

    public function updated($a): void
    {
        dddx($a);
    }
}
