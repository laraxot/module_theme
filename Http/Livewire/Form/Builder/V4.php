<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Livewire\Component;
use Modules\Theme\Services\CollectiveService;

class V4 extends Component {
    public string $type;

    public array $form_data = [];

    public Collection $comps;

    public int $edit_k = -1;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(?string $type = 'builder') {
        $this->type = $type;

        $view_path = realpath(__DIR__.'/../../../../Resources/views/collective/fields');
        $namespace = '';
        $prefix = 'theme::';

        $res = CollectiveService::getComponents($view_path, $namespace, $prefix);
        $res = collect($res)->map(function ($item) {
            $tmp = explode('.', $item->view);
            $name = collect($tmp)->slice(2, -1)->implode('.');
            $parent = null;
            if ('field' != $tmp[3]) {
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
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v4.'.$this->type;

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function add(string $name): void {
        $this->form_data[] = [
            'type' => $name,
            'name' => $name.'_'.count($this->form_data),
            'id' => $name.'_'.count($this->form_data),
        ];
    }

    public function edit(int $k): void {
        $this->edit_k = $k;
    }

    public function delete(int $k): void {
        unset($this->form_data[$k]);
    }
}
