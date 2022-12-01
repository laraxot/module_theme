<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class V6 extends Component {
    public array $form_data = [];
    public array $input_types;
    public string $display_create_input = 'display: none';
    public array $form = [];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount() {
        $this->input_types = [
            'text' => 'text',
            'number' => 'number',
            'email' => 'email',
        ];
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v6';

        $view_params = [
        ];

        return view()->make($view, $view_params);
    }

    public function create() {
        $this->display_create_input = '';
        if (! isset($this->form[$this->form_data['name_attribute']])) {
            $this->form[$this->form_data['name_attribute']] = [];
        }

        if (isset($this->form[$this->form_data['name_attribute']])) {
            $tmp = $this->form_data['name_attribute'];
            $this->form_data = [];
            $this->form_data['name_attribute'] = $tmp;
        }
        // dddx($this->form_data);
    }

    public function add() {
        $tmp = $this->form_data['name_attribute'];
        unset($this->form_data['name_attribute']);
        $this->form[$tmp][] = $this->form_data;
        $this->display_create_input = 'display: none';
        // dddx($this->form_data);
    }
}
