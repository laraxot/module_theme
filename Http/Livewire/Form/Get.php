<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use ReflectionClass;

class Get extends Component {
    public string $form_name;

    public array $form_data = [];
    public $blade_component;
    public $components;
    public $index = null;
    public $selected_element = null;
    public $form_elements = [];
    public $htmlForm = '';
    public $b;

    protected $listeners = [
    ];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $form_name) {
        $this->form_name = $form_name;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /*$tmp = File::get(realpath(__DIR__ . '/../../../../View/Components/_components.json'));

        $this->blade_components = json_decode($tmp);
        $files = File::allFiles(realpath(__DIR__ . '/../../../../Resources/views/components/input/'));

        $f = collect();

        $this->blade_components = collect($files)->filter(function ($item) use ($f) {
            if ('field.blade.php' === $item->getFilename()) {
                $f->push(str_replace('/', '.', explode('/', str_replace('/' . $item->getFilename(), '', $item->getRelativePathname()), 2)));

                return $item;
            }
        });

        $this->b = $this->blade_components->filter(function ($item) {
            if ('field.blade.php' === $item->getFilename()) {
                $item->class_name = "Input\Field";
                $item->comp_name = 'input.field';
                $item->comp_ns = "Modules\Theme\View\Components\Input\Field";

                $a = new ReflectionClass($item->comp_ns);
                $jsonPath = str_replace('.php', '.json', $a->getFileName());
                if (!File::exists($jsonPath)) {
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
                    File::put($jsonPath, \json_encode($data));
                }

                $item->types = str_replace('/', '.', explode('/', str_replace('/' . $item->getFilename(), '', $item->getRelativePathname()), 2));

                $content = File::get($jsonPath);
                $item->props = \json_decode($content);

                $item->props = collect($item->props);

                $item->props->where('name', 'type')->first()->value = $item->types[1] ?? $item->types[0];

                return $item;
            }
        });*/

        $this->form_elements = json_decode(Storage::disk('local')->get($this->form_name.'.json'));

        $this->centerSide();
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.get';

        $view_params = [
            'selected_element' => $this->selected_element,
        ];

        return view()->make($view, $view_params);
    }

    public function centerSide() {
        $view = '';
        $this->form_elements = (array) $this->form_elements;

        foreach ($this->form_elements as $k => $element) {
            $element = (array) $element;

            $component = '<x-'.$element['comp_name'];

            foreach ($element['props'] as $prop) {
                $prop = (array) $prop;

                if ('constructor' === $prop['prop_type'] && ('' !== $prop['value'] || 'true' === $prop['required'])) {
                    $component .= ' ';
                    if ('String' !== $prop['type'] && '' !== $prop['type']) {
                        $component .= ':';
                    }
                    $component .= $prop['name'].'="'.$prop['value'].'" ';
                }
            }
            $component .= '>';
            foreach ($element['props'] as $prop) {
                $prop = (array) $prop;

                if ('slot' === $prop['prop_type'] && ('' !== $prop['value'] || 'true' === $prop['required'])) {
                    $component .= '<x-slot name="'.$prop['name'].'">'.$prop['value'].'</x-slot>';
                }
            }
            $component .= '</x-'.$element['comp_name'].'>';

            $this->form_elements[$k] = (array) $this->form_elements[$k];
            $this->form_elements[$k]['renderedView'] = $this->bladeCompile($component);
        }
    }

    public function bladeCompile($value, array $args = []) {
        $content = \Blade::render($value, []);

        return $content;
    }
}
