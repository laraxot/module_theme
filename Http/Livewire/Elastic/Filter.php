<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Elastic;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Filter.
 */
class Filter extends Component {
    public string $type = 'v3';
    public array $form_data = [];

    // public array $filters = ['must', 'must_not', 'should', 'regexp', 'fuzzy'];

    /**
     * @var array
     */
    protected $listeners = [
        // 'updateDataFromModal' => 'updateDataFromModal',
        //  'updatedFormDataEvent' => 'updateFormData',
    ];

    /**
     * Undocumented function.
     *
     * @param Model $row
     *
     * @return void
     */
    public function mount($row = null) {
        // $data = request()->all();
        // dddx($data);

        if (null != $row) {
            // $this->model_id = $row->getKey();
            // $this->model_class = get_class($row);
        }
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.elastic.filter.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /*
    public function updateFormData(array $data) {
        if ($this->model_id == $data['model_id']) {
            $fields = ['must', 'must_not', 'should', 'regexp', 'fuzzy'];
            $up = [];
            foreach ($fields as $field) {
                if (isset($data[$field])) {
                    $up[$field] = $data[$field];
                }
            }
            if ([] != $up) {
                app($this->model_class)->find($this->model_id)->update($up);
                session()->flash('message', 'Updated.');
            }
        }
    }
    */
}
