<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Panel;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Jobs\PanelCrud\StoreJob;
use Modules\Xot\Services\PanelService;

/**
 * Class Create.
 */
<<<<<<< HEAD
class Create extends Component {
=======
class Create extends Component
{
>>>>>>> ede0df7 (first)
    public Collection $fields;
    public array $rules;
    public array $form_data;
    public string $model_name;

<<<<<<< HEAD
    public function mount(PanelContract $panel): void {
=======
    public function mount(PanelContract $panel): void
    {
>>>>>>> ede0df7 (first)
        $this->rules = $panel->rules();
        $this->fields = $panel->getFields();
    }

<<<<<<< HEAD
    protected function rules(): array {
=======
    protected function rules(): array
    {
>>>>>>> ede0df7 (first)
        return $this->rules;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    /**
     * Render the component.
<<<<<<< HEAD
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.panel.create';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function create() {
        dddx('create!!!');

        // $this->validate();
        // dddx(PanelService::make()->get(xotModel($this->model_name)));
        // PanelService::make()->get(xotModel($this->model_name))->createJob();

        $this->form_data['author_id'] = Auth::id();

        // dddx($this->form_data);

        $r = dispatch(new StoreJob($this->form_data, PanelService::make()->get(xotModel($this->model_name))));

        // dddx($r);
=======
    public function create()
    {
        dddx('create!!!');

        //$this->validate();
        //dddx(PanelService::make()->get(xotModel($this->model_name)));
        //PanelService::make()->get(xotModel($this->model_name))->createJob();

        $this->form_data['author_id'] = Auth::id();

        //dddx($this->form_data);

        $r = dispatch(new StoreJob($this->form_data, PanelService::make()->get(xotModel($this->model_name))));

        //dddx($r);
>>>>>>> ede0df7 (first)

        return redirect()->route('containers.index', ['container0' => 'threads']);
    }
}
