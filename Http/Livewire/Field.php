<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Theme\Services\FieldService;

/**
 * Class Field.
 */
class Field extends Component
{
    public array $field_arr;

    public array $form_data = [];

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = ['setFormData'];

    /**
     * @param \Illuminate\Database\Eloquent\Collection $field
     */
    public function mount($field): void
    {
        // $this->field = FieldService::make($field->name)->type($field->type);
        // $this->field_arr = (array) $field;
        $this->field_arr = $field->toArray();
    }

    public function setFormData(/* $formData */): void
    {
        // $this->form_data = $form_data;
        dddx($this->form_data);
    }

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.fields.text.field';

        $view_params = [
            'view' => $view,
            // 'field' => $this->field,
            // 'field' => FieldService::make($this->field_arr['name'])->type($this->field_arr['type']),
            'field' => (new FieldService())->setVars($this->field_arr),
        ];

        // return '<div>A</div>';

        return view()->make($view, $view_params);
    }
}
