<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Panel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Services\PanelService;
//use Modules\Xot\Jobs\PanelCrud\StoreJob;

/**
 * Class Create.
 */
class Create extends Component {
    public Collection $fields;
    public array $rules;
    public array $form_data;
    public string $model_name;

    public function mount(PanelContract $panel): void {
        $this->rules = $panel->rules();
        $this->fields = $panel->getFields();
    }

    protected function rules(): array {
        return $this->rules;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.panel.create';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create() {
        dddx('create!!!');

        // $this->validate();
        // dddx(PanelService::make()->get(xotModel($this->model_name)));
        // PanelService::make()->get(xotModel($this->model_name))->createJob();

        $this->form_data['author_id'] = Auth::id();

        // dddx($this->form_data);

        // $r = dispatch(new StoreJob($this->form_data, PanelService::make()->get(xotModel($this->model_name))));

        // dddx($r);

        return redirect()->route('containers.index', ['container0' => 'threads']);
    }
}