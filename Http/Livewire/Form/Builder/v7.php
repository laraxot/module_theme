<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class V7 extends Component {
    public array $form_data = [];

    protected $listener = ['saveData' => 'saveData'];

    public $data;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount() {
        $this->data = Storage::disk('cache')->get('paperino');
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.form.builder.v7';

        $view_params = [
        ];

        return view()->make($view, $view_params);
    }

    public function saveData($data) {
        Storage::disk($this->form_data['disk'])->put($this->form_data['filename'].'.json', json_encode($data));
    }

    public function getData() {
        // Storage::disk($this->form_data['disk'])->put($this->form_data['filename'].'.json', json_encode($data));
        $json = Storage::disk('cache')->get('paperino');

        return $json;
    }
}
