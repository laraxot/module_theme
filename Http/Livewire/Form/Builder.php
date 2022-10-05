<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Form;

// use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Builder extends Component {
    public string $type;

    public $components;

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
        $blade_components = json_decode($tmp);
        $view_params = [
            'blade_components' => $blade_components,
        ];

        // dddx($view_params);

        return view()->make($view, $view_params);
    }
}
