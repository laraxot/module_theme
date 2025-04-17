<?php
/**
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use Livewire\Component;

class FormArray extends Component
{
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

    public function mount(array $data, string $bodyView): void
    {
        $this->data = $data;
        $this->show = false;
        $this->form_data['id'] = 777;
        $this->body_view = $bodyView;
    }

    public function editModal(array $form_data): void
    {
        $this->form_data = $form_data;
        $this->doShow();
    }

    public function showModal(array $data): void
    {
        // $this->form_data = $data;

        $this->doShow();
    }

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
        // Do Something With Your Modal

        // Close Modal After Logic
        $this->doClose();
    }

    public function doSave(): void
    {
        $this->emitUp('updateArray', $this->form_data);
        session()->flash('message', 'Post successfully updated.');
    }

    public function render(): View
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.modal.form.array';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
