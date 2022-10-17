<?php
/**
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Modules\Xot\Services\PanelService;

<<<<<<< HEAD
class Simple extends Component {
=======
class Simple extends Component
{
>>>>>>> ede0df7 (first)
    public bool $show = false;
    public array $data;
    public string $body_view;
    public Collection $edit_fields;
    public string $model;
    public Model $row;
    public array $rules;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = [
        'showModal' => 'showModal',
        'editModal' => 'editModal',
    ];

    public array $form_data = [];

<<<<<<< HEAD
    public function mount(array $data, string $bodyView, string $model): void {
=======
    public function mount(array $data, string $bodyView, string $model): void
    {
>>>>>>> ede0df7 (first)
        $this->data = $data;
        $this->show = false;
        $this->form_data['id'] = 5;
        $this->body_view = $bodyView;
        $this->model = $model;
        $row = app($model);
        $panel = PanelService::make()->get($row);
        $this->edit_fields = $panel->getFields(['act' => 'edit']);
        $tmp = $panel->rules(['act' => 'edit']);
        $rules = [];
        foreach ($tmp as $k => $v) {
            $rules['form_data.'.$k] = $v;
        }
<<<<<<< HEAD
        // $this->rules = ['form_data.title' => 'required|string|min:6'];
        $this->rules = $rules;
        // dddx($this->rules);
    }

    // Missing [$rules/rules()] property/method on Livewire component:
    // private function rules() {
    //    return $this->rules;
    // }

    public function editModal(string $model_class, string $id): void {
        $this->row = app($model_class)->find($id);
        // $panel = PanelService::make()->get($row);
        // $this->edit_fields = $panel->getFields(['act' => 'edit']);
        $this->form_data = $this->row->toArray();
        // dddx($this->form_data);
=======
        //$this->rules = ['form_data.title' => 'required|string|min:6'];
        $this->rules = $rules;
        //dddx($this->rules);
    }

    //Missing [$rules/rules()] property/method on Livewire component:
    //private function rules() {
    //    return $this->rules;
    //}

    public function editModal(string $model_class, string $id): void
    {
        $this->row = app($model_class)->find($id);
        //$panel = PanelService::make()->get($row);
        //$this->edit_fields = $panel->getFields(['act' => 'edit']);
        $this->form_data = $this->row->toArray();
        //dddx($this->form_data);
>>>>>>> ede0df7 (first)

        $this->doShow();
    }

<<<<<<< HEAD
    public function showModal(array $data): void {
=======
    public function showModal(array $data): void
    {
>>>>>>> ede0df7 (first)
        $this->form_data = $data;
        $this->doShow();
    }

<<<<<<< HEAD
    public function doShow(): void {
        $this->show = true;
    }

    public function doClose(): void {
        $this->show = false;
    }

    public function doSomething(): void {
=======
    public function doShow(): void
    {
        $this->show = true;
    }

    public function doClose(): void
    {
        $this->show = false;
    }

    public function doSomething(): void
    {
>>>>>>> ede0df7 (first)
        // Do Something With Your Modal

        // Close Modal After Logic
        $this->doClose();
    }

<<<<<<< HEAD
    public function doSave(): void {
        // dddx($this->form_data);
        $panel = PanelService::make()->get($this->row);
        $panel->update($this->form_data);
        // $a = $this->validate($this->rules);

        // $this->row->save();
        session()->flash('message', 'Post successfully updated.');
    }

    public function render(): View {
=======
    public function doSave(): void
    {
        //dddx($this->form_data);
        $panel = PanelService::make()->get($this->row);
        $panel->update($this->form_data);
        //$a = $this->validate($this->rules);

        //$this->row->save();
        session()->flash('message', 'Post successfully updated.');
    }

    public function render(): View
    {
>>>>>>> ede0df7 (first)
        return view('theme::livewire.modal.simple');
    }
}
