<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Support\Collection;
use Modules\Theme\Contracts\FieldContract;
=======
>>>>>>> ede0df7 (first)
use Modules\Theme\Services\FieldService;
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\PanelService;

<<<<<<< HEAD
// use Illuminate\Support\Carbon;
=======
//use Illuminate\Support\Carbon;
>>>>>>> ede0df7 (first)

/**
 * Modules\Theme\Http\Livewire\Edit.
 *
 * @property XotBasePanel $panel
 */
<<<<<<< HEAD
class Edit extends XotBaseFormComponent {
=======
class Edit extends XotBaseFormComponent
{
>>>>>>> ede0df7 (first)
    public array $index_fields = [];

    public array $route_params = [];

    public array $data = [];

<<<<<<< HEAD
    public function mount(?Model $model = null): void {
        $this->route_params = getRouteParameters();
=======
    public function mount(?Model $model = null): void
    {
        $this->route_params = optional(request()->route())->parameters();
>>>>>>> ede0df7 (first)
        $this->data = request()->all();
        $this->setFormProperties($this->panel->getRow());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Response|mixed|null
     */
<<<<<<< HEAD
    public function getPanelProperty() {
=======
    public function getPanelProperty()
    {
>>>>>>> ede0df7 (first)
        return PanelService::make()->getByParams($this->route_params);
    }

    /**
     * @param false $param
     *
     * @return array
     */
<<<<<<< HEAD
    public function rules($param = false) {
        return [];
    }

    public function fields(): array {
        /**
         * @var Collection<FieldContract>
         */
        $panel_fields = $this->panel->getFields(['act' => 'edit']);
        $fields = [];
        foreach ($panel_fields as $field) {
            // $fields[] = FieldService::make($field->name)->type($field->type);
            // Parameter #1 $object of function get_object_vars expects object, mixed given.
=======
    public function rules($param = false)
    {
        return [];
    }

    public function fields(): array
    {
        $panel_fields = $this->panel->getFields(['act' => 'edit']);
        $fields = [];
        foreach ($panel_fields as $field) {
            //$fields[] = FieldService::make($field->name)->type($field->type);
>>>>>>> ede0df7 (first)
            $fields[] = (new FieldService())->setVars(get_object_vars($field));
        }
        /*
        return [
        FieldService::make('Name')->input()->rules(['required', 'string', 'max:255']),
        FieldService::make('Email')->input('email')->rules(['required', 'string', 'email', 'max:255', 'unique:users,email']),
        FieldService::make('Password')->input('password')->rules(['required', 'string', 'min:8', 'confirmed']),
        FieldService::make('Confirm Password', 'password_confirmation')->input('password'),
        ];
        */

        return $fields;
    }
}
