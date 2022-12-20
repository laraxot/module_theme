<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Cms\Models\Panels\XotBasePanel;
use Modules\Cms\Services\PanelService;
use Modules\Theme\Contracts\FieldContract;
use Modules\Theme\Services\FieldService;

// use Illuminate\Support\Carbon;

/**
 * Modules\Theme\Http\Livewire\Edit.
 *
 * @property XotBasePanel $panel
 */
class Edit extends XotBaseFormComponent {
    public array $index_fields = [];

    public array $route_params = [];

    public array $data = [];

    public function mount(?Model $model = null): void {
        $this->route_params = getRouteParameters();
        $this->data = request()->all();
        $this->setFormProperties($this->panel->getRow());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Response|mixed|null
     */
    public function getPanelProperty() {
        return PanelService::make()->getByParams($this->route_params);
    }

    /**
     * @param false $param
     *
     * @return array
     */
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
