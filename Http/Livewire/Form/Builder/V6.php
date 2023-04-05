<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class V6 extends Component
{
    public array $form_data = [];
    public array $input_types;
    public string $display_create_input = 'display: none';
    public array $form = [];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount()
    {
        $this->input_types = [
            'text' => 'text',
            'number' => 'number',
            'email' => 'email',
            'select' => 'select',
        ];
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v6';

        $view_params = [
        ];

        return view()->make($view, $view_params);
    }

    public function create()
    {
        $this->display_create_input = '';
        if (! isset($this->form[$this->form_data['name_attribute']])) {
            $this->form[$this->form_data['name_attribute']] = [];
        }

        if (isset($this->form[$this->form_data['name_attribute']])) {
            $tmp = $this->form_data['name_attribute'];
            $this->form_data = [];
            $this->form_data['name_attribute'] = $tmp;
        }
    }

    public function add()
    {
        $name_attribute = $this->form_data['name_attribute'];
        unset($this->form_data['name_attribute']);
        $this->form[$name_attribute][] = $this->form_data;

        // $this->form[$name_attribute]['options']
        // $this->form_data[$name_attribute]['options'][$this->form_data['value']] = $this->form_data['value_label'];

        $this->display_create_input = 'display: none';
        $this->fillData($name_attribute);
    }

    public function fillData($name_attribute)
    {
        foreach ($this->form[$name_attribute] as $key => $arr) {
            if (! isset($this->form[$name_attribute][$key]['style'])) {
                $this->form[$name_attribute][$key]['style'] = '';
            }
            if (! isset($this->form[$name_attribute][$key]['class'])) {
                $this->form[$name_attribute][$key]['class'] = '';
            }
            if (! isset($this->form[$name_attribute][$key]['id'])) {
                $this->form[$name_attribute][$key]['id'] = '';
            }
            if (! isset($this->form[$name_attribute][$key]['options'])) {
                $this->form[$name_attribute][$key]['options'] = [];
            }
        }
    }

    public function addOption($form_data_key)
    {
        dddx($form_data_key);
        // $this->form_data[$form_data_key]['options'][$this->form_data['value']] = $this->form_data['value_label'];
    }
}
