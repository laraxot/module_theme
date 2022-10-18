<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class V1 extends Component {
    public string $type;

    public $blade_component;
    public $components;
    public $index = null;
    public $selected_element = null;
    public $form_elements = [];

    protected $listeners = [
        'addComponentToForm' => 'addComponentToForm',
    ];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(?string $type = 'builder') {
        $this->type = $type;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v1.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function addComponentToForm($key) {
        $this->form_elements[] = $this->blade_components[$key];
        $this->setDefaultFormElement();
    }

    public function deleteComponentFromForm($k) {
        unset($this->form_elements[$k]);
        $this->setDefaultFormElement();
    }

    public function setDefaultFormElement() {
        if (! isset($this->form_elements[0])) {
            $this->selected_element = null;
            $this->index = null;
        }
        if (! isset($selected_element) && isset($this->form_elements[0])) {
            $this->selected_element = &$this->form_elements[0];
            $this->index = 0;
        }
    }

    public function selectElement($k) {
        $this->index = $k;
        $this->selected_element = &$this->form_elements[$k];
    }
}
