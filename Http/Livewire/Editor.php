<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;

/**
 * Undocumented class.
 */
class Editor extends Component {
    public string $label;

    public string $placeholder = 'Write a reply...';

    public string $body;

    public string $hasButton;

    public string $buttonType = 'submit';

    public string $buttonLabel = 'Submit';

    public string $buttonIcon;

    public function render(): \Illuminate\Contracts\Support\Renderable {
        $this->body = old('body', $this->body);

        return view('theme::livewire.editor');
    }

    public function getPreviewProperty(): string {
        $ret = '';

        $html = md_to_html($this->body ?: '');

        if (! empty($html)) {
            $ret = $html;
        }

        return replace_links($ret);
    }

    public function preview(): void {
        $this->emit('previewRequested');
    }
}
