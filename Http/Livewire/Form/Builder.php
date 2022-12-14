<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Builder extends Component {
    public string $type;

    public array $form_data = [];
    public $blade_component;
    public $components;
    public $index = null;
    public $selected_element = null;
    public $form_elements = [];
    public $htmlForm = '';
    public $b;
    public string $form_name = 'form';

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
        $files = File::allFiles(realpath(__DIR__.'/../../../Resources/views/components/input/'));

        $f = collect();

        $this->blade_components = collect($files)->filter(function ($item) use ($f) {
            if ('field.blade.php' === $item->getFilename()) {
                $f->push(str_replace('/', '.', explode('/', str_replace('/'.$item->getFilename(), '', $item->getRelativePathname()), 2)));

                return $item;
            }
        });

        $this->b = $this->blade_components->filter(function ($item) {
            if ('field.blade.php' === $item->getFilename()) {
                $item->class_name = "Input\Field";
                $item->comp_name = 'input.field';
                $item->comp_ns = "Modules\Theme\View\Components\Input\Field";

                $a = new \ReflectionClass($item->comp_ns);
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
                                'prop_type' => 'constructor',
                                'required' => 'true',
                                'value' => $value,
                            ];
                        }
                    }
                    File::put($jsonPath, json_encode($data));
                }

                $item->types = str_replace('/', '.', explode('/', str_replace('/'.$item->getFilename(), '', $item->getRelativePathname()), 2));

                $content = File::get($jsonPath);
                $item->props = json_decode($content);

                $item->props = collect($item->props);

                $item->props->where('name', 'type')->first()->value = $item->types[1] ?? $item->types[0];

                // dddx($item);

                return $item;
            }
        });

        $view_params = [
            'blade_components' => $this->b,
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

    public function addComponentToForm(string $key) {
        // dddx($this->b);
        $this->form_elements[] = $this->b[$key];
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

    public function saveForm() {
        // Storage::disk('local')->put('form.html', $html);
        if (empty($this->form_name) || 'form' === $this->form_name) {
            session()->flash('error', 'please specify a valid form name');

            return;
        }
        Storage::disk('local')->put($this->form_name.'.json', json_encode($this->form_elements));
        session()->flash('message', 'form salvato');
    }
}
