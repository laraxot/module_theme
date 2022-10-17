<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class Editor extends Component {
=======
class Editor extends Component
{
>>>>>>> ede0df7 (first)
    public string $label;

    public string $placeholder = 'Write a reply...';

<<<<<<< HEAD
    public string $body = '';
=======
    public string $body;
>>>>>>> ede0df7 (first)

    public string $hasButton;

    public string $buttonType = 'submit';

    public string $buttonLabel = 'Submit';

    public string $buttonIcon;

<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $body = old('body', $this->body);
        if (is_string($body)) {
            $this->body = $body;
        }
        /**
         *  @phpstan-var view-string
         */
        $view = 'theme::livewire.editor';
        $view_params = [];

        return view($view, $view_params);
    }

    public function getPreviewProperty(): string {
=======
    /**
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
        $this->body = old('body', $this->body);

        return view('theme::livewire.editor');
    }

    public function getPreviewProperty(): string
    {
>>>>>>> ede0df7 (first)
        $ret = '';

        $html = md_to_html($this->body ?: '');

        if (! empty($html)) {
            $ret = $html;
        }

        return replace_links($ret);
    }

<<<<<<< HEAD
    public function preview(): void {
=======
    public function preview(): void
    {
>>>>>>> ede0df7 (first)
        $this->emit('previewRequested');
    }
}
