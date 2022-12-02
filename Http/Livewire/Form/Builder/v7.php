<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form\Builder;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class V7 extends Component {
    public array $form_data = [];

    protected $listener = ['saveData' => 'saveData'];

    public json $data;

    public array $menus;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount() {
        $this->menus = Storage::disk('cache')->files();
        // $this->data = Storage::disk('cache')->get('paperino');
    }

    protected $messages = [
        'form_data.disk' => 'Devi selezionare il disk',
        'form_data.filename' => 'Devi inserire un filename',
    ];

    protected function rules() {
        return [
            'form_data.disk' => 'required',
            'form_data.filename' => 'required',
        ];
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
        $this->validate();
        Storage::disk($this->form_data['disk'])->put($this->form_data['filename'].'.json', json_encode($data));
    }

    public function getData() {
        // Storage::disk($this->form_data['disk'])->put($this->form_data['filename'].'.json', json_encode($data));
        $json = Storage::disk('cache')->get('paperino.json');
        // dddx($json);

        return $json;
    }
}
