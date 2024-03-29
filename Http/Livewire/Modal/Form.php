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
use Modules\Cms\Services\PanelService;

class Form extends Component
{
    public bool $show = false;
    public array $data;
    public string $body_view;
    public Collection $edit_fields;
    public string $model;
    public Model $row;

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

    public function mount(array $data, string $bodyView, string $model): void
    {
        $this->data = $data;
        $this->show = false;
        $this->form_data['id'] = 5;
        $this->body_view = $bodyView;
        $this->model = $model;
        $row = app($model);
        $panel = PanelService::make()->get($row);
        $this->edit_fields = $panel->getFields(['act' => 'edit']);
    }

    public function editModal(string $id): void
    {
        $this->row = app($this->model)->find($id);
        $data = $this->row->toArray();
        $this->form_data = $data;

        if (isset($data['address']) && isJson($data['address'])) {
            /**
             * @var object
             */
            $tmp = json_decode($data['address']);
            $this->form_data['address_value'] = $tmp->value ?? '';
        }

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
        // dddx($this->form_data);
        $panel = PanelService::make()->get($this->row);
        $panel->update($this->form_data);
        // $a = $this->validate($this->rules);

        // $this->row->save();
        session()->flash('message', 'Post successfully updated.');
    }

    public function render(): View
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.modal.form';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
