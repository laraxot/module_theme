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
    public ?string $menu_loaded = null;

    public array $menus;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount() {
        $this->menus = $this->getAllFiles();
    }

    protected $messages = [
        'form_data.disk' => 'Devi selezionare il disk',
        'form_data.filename' => 'Devi inserire un filename',
        'form_data.menu' => 'Devi prima selezionare un menu',
    ];

    protected function rules() {
        return [
            'form_data.disk' => 'required',
            'form_data.filename' => 'required',
            // 'form_data.menu' => 'required',
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
        if (! is_null($this->menu_loaded)) {
            Storage::disk('cache')->put($this->menu_loaded, json_encode($data));
        } else {
            $this->validate();
            Storage::disk($this->form_data['disk'])->put($this->form_data['filename'].'.json', json_encode($data));
        }
        session()->flash('saved', 'menu salvato');
    }

    public function getData() {
        $validatedData = $this->validate([
            'form_data.menu' => 'required',
        ]);
        // Storage::disk($this->form_data['disk'])->put($this->form_data['filename'].'.json', json_encode($data));
        $json = Storage::disk('cache')->get($this->form_data['menu']);
        $this->menu_loaded = $this->form_data['menu'];
        // dddx($json);

        return $json;
    }

    public function getAllFiles() {
        $files = Storage::disk('cache')->files();
        $tmp = [];
        foreach ($files as $file) {
            $tmp[$file] = $file;
        }

        return $tmp;
    }

    public function clearFields() {
        $this->menu_loaded = null;
        $this->form_data['menu'] = $this->getAllFiles();
    }
}
