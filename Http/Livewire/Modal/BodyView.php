<?php
/**
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal;

use Livewire\Component;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
/**
 * Undocumented class
 */
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
=======
/**
 * Undocumented class
 */
>>>>>>> fbdf27c6 (.)
=======
/**
 * Undocumented class
 */
>>>>>>> 7f97b271 (up)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
class BodyView extends Component {
    public bool $show = false;
    public string $body_view;
    public string $modal_id;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
>>>>>>> ede0df75 (first)

    public string $title;
    public ?string $subtitle;

    public array $form_data = [];
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
    public string $title;
    public string $popup_title;
    public string $popup_button;
>>>>>>> b6141c95 (first)
=======
    public string $title;
    public string $popup_title;
    public string $popup_button;
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
    public string $title;
    public string $popup_title;
    public string $popup_button;
>>>>>>> b6141c95 (first)
=======
    public string $title;
    public string $popup_title;
    public string $popup_button;
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)

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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> e003a241 (.)
    /**
     * Undocumented function
     *
     * @param string $id
     * @param string $title
     * @param string|null $subtitle
     * @param string $bodyView
     * @return void
     */
<<<<<<< HEAD
=======
>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
>>>>>>> e003a241 (.)
=======
>>>>>>> ede0df75 (first)
    public function mount(string $id, string $title, string $subtitle = null, string $bodyView): void {
        $this->show = false;
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->body_view = $bodyView;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
    public array $form_data = [];

    public function mount(string $id, string $popup_title, string $popup_subtitle, string $popup_button, string $bodyView): void {
        $this->show = false;

        $this->popup_title = $popup_title;

        $this->popup_subtitle = $popup_subtitle;

        $this->popup_button = $popup_button;

        $this->body_view = $bodyView;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
        $this->modal_id = $id;
    }

    public function sendMessage(string $msg) {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
>>>>>>> ede0df75 (first)
        session()->flash('message', $msg);
    }

    public function showModal(string $id, array $data): void {
        if ($id === $this->modal_id) {
            $this->doShow();
            $this->form_data = array_merge($this->form_data, $data);
        }
    }

    public function sendData(): void {
        // dddx($this->form_data);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $this->emit('updateDataFromModal', $this->modal_id, $this->form_data);
    }

<<<<<<< HEAD
=======
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
        //per pulire il form
        $this->form_data = [];
        session()->flash('message', $msg);
    }

    public function showModal(string $id): void {
        if ($id === $this->modal_id) {
            $this->doShow();
        }
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
        $this->emit('updateDataFromModal', $this->form_data);
=======
        $this->emit('updateDataFromModal', $this->modal_id, $this->form_data);
>>>>>>> 992fe1f3 (.)
    }

>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
        $this->emit('updateDataFromModal', $this->form_data);
=======
        $this->emit('updateDataFromModal', $this->modal_id, $this->form_data);
>>>>>>> 992fe1f3 (.)
    }

>>>>>>> ede0df75 (first)
    public function doShow(): void {
        $this->show = true;
    }

    public function doClose(): void {
        $this->show = false;
    }

    public function doSomething(): void {
        $this->doClose();
    }

    public function render() {
        $view = 'theme::livewire.modal.body_view';

        $view_params = [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
            'title' => $this->title,
            'popup_title' => $this->popup_title,
            'popup_subtitle' => $this->popup_subtitle,
            'popup_button' => $this->popup_button,
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
<<<<<<< HEAD
}
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
}
>>>>>>> ede0df75 (first)
=======
>>>>>>> 7f97b271 (up)
=======
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
}
>>>>>>> ede0df75 (first)
