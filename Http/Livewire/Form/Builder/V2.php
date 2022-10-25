<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Livewire\Component;
use ReflectionClass;

class V2 extends Component {
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
        $view = 'theme::livewire.form.builder.v2.'.$this->type;
        // laravel\Modules\Theme\Http\Livewire\_components.json
        // laravel\Modules\Theme\View\Components\_components.json
        $tmp = File::get(realpath(__DIR__.'/../../../../View/Components/_components.json'));

        $this->blade_components = json_decode($tmp);

        $this->blade_components = collect($this->blade_components)->filter(function ($item) {
            if (Str::contains($item->comp_name, 'input.')) {
                return $item;
            }
        });

        $this->blade_components =
            collect($this->blade_components)
            // $this->blade_components
            ->map(function ($item) {
                $a = new ReflectionClass($item->comp_ns);

                // dddx($a->getMethod('render'));
                // dddx([$a->getConstructor()->getParameters(),json_encode($a->getConstructor()->getParameters())]);

                $jsonPath = str_replace('.php', '.json', $a->getFileName());

                if (! File::exists($jsonPath)) {
                    $data = [];

                    if (null !== $a->getConstructor() && null !== $a->getConstructor()->getParameters()) {
                        foreach ($a->getConstructor()->getParameters() as $param) {
                            $type = (null !== $param->getType() && null !== $param->getType()->getName()) ? (ucfirst($param->getType()->getName())) : '';

                            $value = '';

                            if ('class' === $param->name) {
                                $value = 'form-control';
                            }
                            if ('String' !== $type && '' !== $type) {
                                $value = '[]';
                            }
                            $data[] = [
                                'name' => $param->name,
                                'type' => $type,
                                'comment' => '',
                                'value' => $value,
                                'prop_type' => 'constructor',
                                'required' => 'true',
                            ];
                        }
                    }

                    // dddx(\json_encode($data));
                    File::put($jsonPath, json_encode($data));
                }
                $content = File::get($jsonPath);

                $item->props = json_decode($content);

                return $item;
            });

        $view_params = [
            'blade_components' => $this->blade_components,
            'form' => $this->form_elements,
            'selected_element' => $this->selected_element,
        ];

        // dddx($view_params);

        return view()->make($view, $view_params);
    }

    public function bladeCompile($value, array $args = []) {
        $content = \Blade::render($value, []);

        return $content;
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
