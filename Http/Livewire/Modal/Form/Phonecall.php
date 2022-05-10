<?php
/**
 * https://marcocaggiano.medium.com/creating-a-popup-modal-with-laravel-livewire-and-no-jquery-1806736acd82.
 */

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Modal\Form;

use Livewire\Component;
use Modules\Cybersecurity\Mail\MyTestMail;

class Phonecall extends Component {
    public string $title;
    public bool $show = false;
    public string $body_view;

    protected $listeners = ['doSend' => 'doSend'];

    public function mount(string $title = '', string $popup_title = 'Titolo Modal', string $popup_subtitle = 'Sotto-titolo Modal', string $popup_button = 'Invia', string $color = '#007bff'): void {
        $this->title = $title;
        $this->popup_subtitle = $popup_subtitle;
        $this->popup_title = $popup_title;
        $this->popup_button = $popup_button;
        $this->color = $color;
        $this->show = false;
    }

    public function showModal(string $id): void {
        $this->emitTo('theme::modal.body-view', 'showModal', $id);
    }

    public function doShow(): void {
        $this->show = true;
    }

    public function doClose(): void {
        $this->show = false;
    }

    public function doSend($form_data): void {
        if (empty($form_data['business_name'])) {
            $this->emitTo('theme::modal.body-view', 'sendMessage', 'Compila il campo Azienda');

            return;
        }

        if (empty($form_data['email'])) {
            $this->emitTo('theme::modal.body-view', 'sendMessage', 'Compila il campo Email');

            return;
        }

        if (empty($form_data['phone'])) {
            $this->emitTo('theme::modal.body-view', 'sendMessage', 'Compila il campo Telefono');

            return;
        }

        if (empty($form_data['privacy'])) {
            $this->emitTo('theme::modal.body-view', 'sendMessage', 'Spunta il campo Privacy');

            return;
        }

        $details = [
            'business_name' => $form_data['business_name'],
            'email' => $form_data['email'],
            'title' => 'Richiesta da Cybersecurity.it',
            'body' => 'Numero di telefono: '.$form_data['phone'],
        ];

        $to_email = 'pentesting@cybersec00.com';

        \Mail::to($to_email)->send(new MyTestMail($details));

        $this->emitTo('theme::modal.body-view', 'sendMessage', 'Messaggio Inviato');
        // $this->emitTo('theme::modal.body-view', 'doClose');
    }

    public function render() {
        $view = 'theme::livewire.modal.form.phonecall';

        $view_params = [
            'title' => $this->title,
            'popup_title' => $this->popup_title,
            'popup_subtitle' => $this->popup_subtitle,
            'popup_button' => $this->popup_button,
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
