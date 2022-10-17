<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Manage;

use Illuminate\Contracts\Support\Renderable;
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
    // public FieldService $field;

    public array $form_data = [];

    /**
     * Undocumented function.
     */
    public function mount(string $filename): void {
        $this->filename = $filename;
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
        ];

        return view()->make($view, $view_params);
    }

    public function save(): void {
        $data = $this->form_data;

        ArrayService::save(['filename' => $this->filename, 'data' => $data]);
    }
}
