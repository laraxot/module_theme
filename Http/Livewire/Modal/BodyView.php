<?php
/**
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Undocumented class.
 */
class BodyView extends Component
{
    public bool $show = false;
    public string $body_view;
    public string $modal_id;
    public string $title;
    public ?string $subtitle;

    public array $form_data = [];
    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = [
        'showModal' => 'showModal',
        'doClose' => 'doClose',
        'sendMessage' => 'sendMessage',
    ];

    /**
     * Undocumented function.
     */
    public function mount(string $id, string $title, string $subtitle = null, string $bodyView): void
    {
        $this->modal_id = $id;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->body_view = $bodyView;
        $this->show = false;
    }

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function sendMessage(string $msg)
    {
        session()->flash('message', $msg);
    }

    public function showModal(string $id, array $data): void
    {
        $this->form_data = [];
        if ($id === $this->modal_id) {
            $this->doShow();
            $this->form_data = array_merge($this->form_data, $data);
            // dddx([array_merge($this->form_data, $data), $this->form_data, $data]);
        }
        // dddx($this->form_data); // qui controllo cosa arriva al modal
    }

    public function sendData(?string $event = null): void
    {
        // dddx($this);
        // dddx($this->form_data);
        if (null === $event) {
            $event = 'updateDataFromModal';
        }
        // dddx([$event, $this->modal_id, $this->form_data]);
        $this->emit($event, $this->modal_id, $this->form_data);
        // session()->flash('message', 'Saved !');
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
        $this->doClose();
    }

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.modal.body_view';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
