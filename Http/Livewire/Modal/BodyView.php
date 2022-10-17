<?php
/**
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Undocumented class.
 */
=======
use Livewire\Component;

>>>>>>> ede0df7 (first)
class BodyView extends Component {
    public bool $show = false;
    public string $body_view;
    public string $modal_id;
<<<<<<< HEAD
=======

>>>>>>> ede0df7 (first)
    public string $title;
    public ?string $subtitle;

    public array $form_data = [];
<<<<<<< HEAD
=======

>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
    /**
     * Undocumented function.
     */
    public function mount(string $id, string $title, string $subtitle = null, string $bodyView): void {
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
=======
    public function mount(string $id, string $title, string $subtitle = null, string $bodyView): void {
        $this->show = false;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->body_view = $bodyView;
        $this->modal_id = $id;
    }

>>>>>>> ede0df7 (first)
    public function sendMessage(string $msg) {
        session()->flash('message', $msg);
    }

    public function showModal(string $id, array $data): void {
<<<<<<< HEAD
        $this->form_data = [];
        if ($id === $this->modal_id) {
            $this->doShow();
            $this->form_data = array_merge($this->form_data, $data);
            // dddx([array_merge($this->form_data, $data), $this->form_data, $data]);
        }
        // dddx($this->form_data); // qui controllo cosa arriva al modal
    }

    public function sendData(?string $event = null): void {
        // dddx($this);
        // dddx($this->form_data);
        if (is_null($event)) {
            $event = 'updateDataFromModal';
        }
        // dddx([$event, $this->modal_id, $this->form_data]);
        $this->emit($event, $this->modal_id, $this->form_data);
        // session()->flash('message', 'Saved !');
=======
        if ($id === $this->modal_id) {
            $this->doShow();
            $this->form_data = array_merge($this->form_data, $data);
        }
    }

    public function sendData(): void {
        // dddx($this->form_data);
        $this->emit('updateDataFromModal', $this->form_data);
>>>>>>> ede0df7 (first)
    }

    public function doShow(): void {
        $this->show = true;
    }

    public function doClose(): void {
        $this->show = false;
    }

    public function doSomething(): void {
        $this->doClose();
    }

<<<<<<< HEAD
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render() {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.modal.body_view';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> ede0df7 (first)
