<?php
/**
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

<<<<<<< HEAD
class FormArray extends Component {
=======
class FormArray extends Component
{
>>>>>>> ede0df7 (first)
    public bool $show = false;
    public array $data;
    public string $body_view;
    public array $form_data = [];
    public string $model;
    public Model $row;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = [
        'showModal' => 'showModal',
        'editModalArray' => 'editModal',
    ];

<<<<<<< HEAD
    public function mount(array $data, string $bodyView): void {
=======
    public function mount(array $data, string $bodyView): void
    {
>>>>>>> ede0df7 (first)
        $this->data = $data;
        $this->show = false;
        $this->form_data['id'] = 777;
        $this->body_view = $bodyView;
    }

<<<<<<< HEAD
    public function editModal(array $form_data): void {
=======
    public function editModal(array $form_data): void
    {
>>>>>>> ede0df7 (first)
        $this->form_data = $form_data;
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
=======
    public function doSave(): void
    {
>>>>>>> ede0df7 (first)
        $this->emitUp('updateArray', $this->form_data);
        session()->flash('message', 'Post successfully updated.');
    }

<<<<<<< HEAD
    public function render(): View {
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        return view('theme::livewire.modal.form.array');
    }
}
