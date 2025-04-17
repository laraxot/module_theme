<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Modules\Tenant\Services\TenantService;
use Modules\Theme\Services\CollectiveService;
use Modules\Xot\Services\FileService;

class V1 extends Component
{
    public string $type;

    public array $form_data = [];
    public array $form_edit = [];

    public Collection $comps;

    public int $edit_k = -1;

    /**
     * @var array
     */
    protected $listeners = [
        // 'updateDataFromModal' => 'updateDataFromModal',
        'updatedFormDataEvent' => 'updateFormDataEvent',
    ];

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(?string $type = 'builder')
    {
        $data = TenantService::config('forms.uno');
        if (! \is_array($data)) {
            $data = [];
        }
        $this->form_data = $data;

        $this->type = $type;

        $view_path = realpath(__DIR__.'/../../../../Resources/views/collective/fields');
        $namespace = '';
        $prefix = 'theme::';

        $res = CollectiveService::getComponents($view_path, $namespace, $prefix);
        $res = collect($res)->map(function ($item) {
            $tmp = explode('.', $item->view);
            $name = collect($tmp)->slice(2, -1)->implode('.');
            $parent = null;
            if ('field' !== $tmp[3]) {
                $parent = $tmp[2];
            }

            return collect([
                'name' => $name,
                'parent' => $parent,
            ]);
        });

        $this->comps = $res;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v1.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function add(string $name): void
    {
        /*
        $view = 'theme::collective.fields.'.$name.'.field';
        $view_file = FileService::viewPath($view);
        $json_file = str_replace('\field.blade.php', '\data.json', $view_file);

        if (! File::exists($json_file)) {
            $data = [
                [
                    'name' => 'name',
                    'type' => 'text',
                ],
                [
                    'name' => 'class',
                    'type' => 'text',
                ],
                [
                    'name' => 'col_size',
                    'type' => 'int',
                ],
                [
                    'name' => 'label',
                    'type' => 'text',
                ],
                [
                    'name' => 'label_class',
                    'type' => 'text',
                ],
            ];
        }
        $this->form_data[] = $data;
        */
        // *
        $this->form_data[] = [
            'type' => $name,
            'name' => $name.'_'.\count($this->form_data),
            'id' => $name.'_'.\count($this->form_data),
        ];
        // */
    }

    public function edit(int $k): void
    {
        $this->edit_k = $k;
        $curr = $this->form_data[$k];

        $view = 'theme::collective.fields.'.$curr['type'].'.field';
        $view_file = FileService::viewPath($view);
        $json_file = str_replace(\DIRECTORY_SEPARATOR.'field.blade.php', \DIRECTORY_SEPARATOR.'data.json', $view_file);

        if (! File::exists($json_file)) {
            $tmp = [
                [
                    'name' => 'name',
                    'type' => 'text',
                ],
                [
                    'name' => 'class',
                    'type' => 'text',
                ],
                [
                    'name' => 'col_size',
                    'type' => 'int',
                ],
                [
                    'name' => 'label',
                    'type' => 'text',
                ],
                [
                    'name' => 'label_class',
                    'type' => 'text',
                ],
            ];

            if ('select' === $curr['type']) {
                $tmp[] = [
                    'name' => 'options',
                    'type' => 'array',
                ];
            }
        } else {
            $content = File::get($json_file);
            dddx([
                'message' => '------------------  WIP   ---------------',
                'view_file' => $view_file,
                'json_file' => $json_file,
                'content' => $content,
            ]);
        }
        // --- per ora non salvo , dobbiamo vendere i campi corretti

        $tmp = collect($tmp)->map(function ($item) {
            $item['name'] = $this->edit_k.'.'.$item['name'];

            return $item;
        })->all();

        $this->form_edit = $tmp;
    }

    public function updateInputOrder(array $orders)
    {
        $tmp = [];
        foreach ($orders as $order) {
            $tmp[] = $this->form_data[$order['value']];
        }
        $this->form_data = $tmp;
    }

    public function updateFormDataEvent(array $data)
    {
        dddx(['data' => $data]);
    }

    public function addArr()
    {
        $this->form_data[0]['options'][] = ['a' => 'test'];
    }
}
