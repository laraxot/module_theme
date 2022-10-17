<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Manage;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Modules\Theme\Services\FieldService;
use Modules\Theme\Traits\HandlesArrays;
use Modules\Xot\Services\ArrayService;

/**
 * Undocumented class.
 */
class PhpArray extends Component {
    use HandlesArrays;

    public string $filename;
<<<<<<< HEAD
    // public FieldService $field;
=======
    public FieldService $field;
>>>>>>> ede0df7 (first)

    public array $form_data = [];

    /**
     * Undocumented function.
     */
    public function mount(string $filename): void {
        $this->filename = $filename;
<<<<<<< HEAD
        /**
         * @var array
         */
        $contents = File::getRequire($this->filename);

        $this->form_data = $contents;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.manage.php-array';
        $view_params = [
            'view' => $view,
            'data' => $this->form_data,
            'prefix' => '',
=======
        $contents = File::getRequire($this->filename);
        $data = $this->mapData($contents);
        $this->form_data[$this->field->name] = $data;
    }

    public function mapData(array $rows): array {
        return collect($rows)
            ->map(
                function ($value, $key) {
                    if (is_array($value)) {
                        $value = $this->mapData($value);
                    }

                    return [
                        'key' => $key,
                        'value' => $value,
                    ];
                }
            )
        ->values()
        ->all();
    }

    public function unMapData(array $rows): array {
        return collect($rows)
            ->map(
                function ($item) {
                    $value = $item['value'];
                    if (is_array($value)) {
                        $value = $this->unMapData($value);
                    }

                    return [$item['key'] => $value];
                }
            )
            ->collapse()
            ->all();
    }

    public function getFieldProperty(): object {
        $field = (object) ([
            'key' => 'form_data.test',
            'name' => 'test',
            'label' => 'label',
            'array_sortable' => true,
            'help' => 'che questo possa aiutarti',
            'array_fields' => [
                (object) [
                    'name' => 'key',
                    'type' => 'input',
                    'input_type' => 'text',
                    'placeholder' => 'placeholder',
                    'autocomplete' => false,
                    //'textarea_rows' => 6,
                    'column_width' => 3,
                    'help' => '',
                ],
                (object) [
                    'name' => 'value',
                    'type' => 'recursive',
                    'input_type' => 'text',
                    'placeholder' => 'placeholder',
                    'autocomplete' => false,
                    //'textarea_rows' => 6,
                    'column_width' => 9,
                    'help' => '',
                ],
            ],
        ]);

        return $field;
    }

    public function fields(): array {
        return [
            (object) [
                'name' => 'nonna papera',
            ],
        ];
    }

    public function render(): \Illuminate\Contracts\Support\Renderable {
        $view = 'theme::livewire.manage.php-array';
        $view_params = [
            'view' => $view,
            'field' => $this->field,
>>>>>>> ede0df7 (first)
        ];

        return view()->make($view, $view_params);
    }

<<<<<<< HEAD
    public function save(): void {
        $data = $this->form_data;

        ArrayService::save(['filename' => $this->filename, 'data' => $data]);
    }
}
=======
    public function save(string $name): void {
        $data = $this->form_data[$name];
        $data = $this->unMapData($data);
        ArrayService::save(['filename' => $this->filename, 'data' => $data]);
    }
}
>>>>>>> ede0df7 (first)
