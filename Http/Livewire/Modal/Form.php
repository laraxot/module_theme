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
class Form extends Component {
=======
class Form extends Component
{
>>>>>>> ede0df7 (first)
    public bool $show = false;
    public array $data;
    public string $body_view;
    public Collection $edit_fields;
    public string $model;
    public Model $row;

    /**
<<<<<<< HEAD
     * Listener di eventi di Livewire.
=======
     * Listener di eventi di Livewire
>>>>>>> ede0df7 (first)
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
    }

<<<<<<< HEAD
    public function editModal(string $id): void {
=======
    public function editModal(string $id): void
    {
>>>>>>> ede0df7 (first)
        $this->row = app($this->model)->find($id);
        $data = $this->row->toArray();
        $this->form_data = $data;

        if (isset($data['address']) && isJson($data['address'])) {
<<<<<<< HEAD
            /**
             * @var object
             */
=======
>>>>>>> ede0df7 (first)
            $tmp = json_decode($data['address']);
            $this->form_data['address_value'] = $tmp->value ?? '';
        }

        $this->doShow();
    }

<<<<<<< HEAD
    public function showModal(array $data): void {
        // $this->form_data = $data;
=======
    public function showModal(array $data): void
    {
        //$this->form_data = $data;
>>>>>>> ede0df7 (first)

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
        return view('theme::livewire.modal.form');
    }
}
