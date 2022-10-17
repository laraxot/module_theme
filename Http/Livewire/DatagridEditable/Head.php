<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\DatagridEditable;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
// use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
// use Modules\Theme\Traits\HandlesArrays;
// use Modules\Theme\Traits\UploadsFiles;

use Illuminate\Support\Str;
use Modules\Theme\Contracts\FieldContract;
=======
//use Livewire\WithFileUploads;
use Illuminate\Support\Str;
//use Modules\Theme\Traits\HandlesArrays;
//use Modules\Theme\Traits\UploadsFiles;

>>>>>>> ede0df7 (first)
use Modules\Theme\Services\FieldService;
use Modules\Xot\Http\Livewire\XotBaseComponent;
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\PanelService;

/**
 * Modules\Theme\Http\Livewire\DatagridEditable\Head.
 *
 * @property XotBasePanel $panel
 */
<<<<<<< HEAD
class Head extends XotBaseComponent {
    //  use WithFileUploads;
    //  use UploadsFiles;
    //  use HandlesArrays;
    // public $index_fields = [];
    // public $route_params = [];
    // public $data =  [];
    // public $in_admin;
=======
class Head extends XotBaseComponent
{
    //  use WithFileUploads;
    //  use UploadsFiles;
    //  use HandlesArrays;
    //public $index_fields = [];
    //public $route_params = [];
    //public $data =  [];
    //public $in_admin;
>>>>>>> ede0df7 (first)

    public mixed $row;

    public string $index;

<<<<<<< HEAD
    // public $fields;
=======
    //public $fields;
>>>>>>> ede0df7 (first)

    public array $form_data = [];

    /**
     * @param \Illuminate\Database\Eloquent\Model|null $row
     * @param string                                   $index
     */
<<<<<<< HEAD
    public function mount($row, $index): void {
=======
    public function mount($row, $index): void
    {
>>>>>>> ede0df7 (first)
        $this->row = $row;
        $this->index = $index;

        $this->setFormProperties($row);
    }

<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = $this->getView();
        $view_params = [
            'view' => $view,
            'form_data' => $this->form_data,
            'fields' => $this->fields(),
        ];

        return view()->make($view, $view_params);
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
        $index_fields = $this->panel->getFields(['act' => 'index']);

        $fields = [];
        foreach ($index_fields as $field) {
            $fields[] = (new FieldService())
<<<<<<< HEAD
                ->setName((string) $field->name)
                ->setType((string) $field->type)
=======
                ->setName($field->name)
                ->setType($field->type)
>>>>>>> ede0df7 (first)
                ->setInputComponent('nolabel');
        }

        return $fields;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed|null
     */
<<<<<<< HEAD
    public function getPanelProperty() {
        /**
         * @var \Illuminate\Database\Eloquent\Model
         */
        $row = $this->row;

        return PanelService::make()->get($row);
    }

    public function setFormProperties(?Model $model = null): void {
        // $this->model = $model;
=======
    public function getPanelProperty()
    {
        return PanelService::make()->get($this->row);
    }

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
                    /*} catch (\Exception $e) {
                    }*/
                    $this->form_data[$field->name] = $rel_val;
                }
            }
        }
    }
}
