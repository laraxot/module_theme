<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Elastic;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Mediamonitor\Models\Alert as AlertModel;

/**
 * Class Filter.
 */
class Filter extends Component {
    public string $type = 'v3';
    public array $form_data = [];
    public array $value = [];

    public ?int $model_id;
    public ?string $model_class = null;

    /**
     * @var array
     */
    protected $listeners = [
        // 'updateDataFromModal' => 'updateDataFromModal',
        'updatedFormDataEvent' => 'updatedFormData',
    ];

    /**
     * Undocumented function.
     *
     * @param Model $row
     *
     * @return void
     */
    public function mount(?AlertModel $row = null) {
        // $data = request()->all();
        // dddx($data);

        if (null != $row) {
            $this->model_id = $row->getKey();
            $this->model_class = get_class($row);
            $tmp = $row->toArray();
            $value = [];
            $value['filter'] = [];

            if (isset($tmp['filter']) && ! empty($tmp['filter'])) {
                foreach ($tmp['filter'] as $k => $v) {
                    // dddx(['filter' => $tmp['filter'], 'k' => $k, 'v' => $v]);
                    // dddx(['v' => $v, 'array_keys($v)' => array_keys($v), 'values' => array_values($v)]);
                    $c = collect($v);
                    // dddx(['c' => $c, 'k' => $c->keys()->first(), 'v' => $c->values()->first()]);
                    $value['filter'][$k] = [
                        'criteria' => $c->keys()->first(),
                        'q' => $c->values()->first(),
                    ];
                }

                $this->value = $value;
                $this->form_data['filter'] = $value['filter'];
            }
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

     public function updatedFormData(array $data) {
         dddx($this->form_data);

         $this->form_data[$data[1]] = $data[0];
     }
    /*
     public function updateFormData(array $data) {
         if (isset($this->model_class) && $this->model_id == $data['model_id']) {
             $tmp = $data['filter'];
             $filter = [];
             foreach ($tmp as $k => $v) {
                 $criteria = $v['criteria'] ?? 'query_string_query';
                 $filter[$k][$criteria] = $v['q'] ?? '';
             }
             $up = [];
             $up['filter'] = $filter;

             app($this->model_class)->find($this->model_id)->update($up);
             session()->flash('message', 'Updated.');
         }
     }
     // */
}
