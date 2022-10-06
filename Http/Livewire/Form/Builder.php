<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use ReflectionClass;

class Builder extends Component {
    public string $type;

    public $blade_component;
    public $components;
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
        $view = 'theme::livewire.form.builder.'.$this->type;
        // laravel\Modules\Theme\Http\Livewire\_components.json
        // laravel\Modules\Theme\View\Components\_components.json
        $tmp = File::get(realpath(__DIR__.'/../../../View/Components/_components.json'));
        $this->blade_components = json_decode($tmp);

        $this->blade_components = collect($this->blade_components)->map(function ($item) {
            $a = new ReflectionClass($item->comp_ns);

            $jsonPath = str_replace('.php', '.json', $a->getFileName());

            if (! File::exists($jsonPath)) {
                $data = [
                    ['name' => 'name',
                        'type' => 'String',
                        'comment' => '', ],
                    ['name' => 'label',
                        'type' => 'String',
                        'comment' => '', ],
                    ['name' => 'class',
                        'type' => 'String',
                        'comment' => '', ],
                    ['name' => 'label_class',
                        'type' => 'String',
                        'comment' => '', ],
                ];
                File::put($jsonPath, \json_encode($data));
            }
            $content = File::get($jsonPath);
            $item->props = \json_decode($content);

            return $item;
        });
        // dddx($blade_components);

        $view_params = [
            'blade_components' => $this->blade_components,
            'form' => $this->form_elements,
        ];

        // dddx($view_params);

        return view()->make($view, $view_params);
    }

    public function addComponentToForm($key) {
        $this->form_elements[] = $this->blade_components[$key];
    }

    public function deleteComponentFromForm($k) {
        unset($this->form_elements[$k]);
    }
}
