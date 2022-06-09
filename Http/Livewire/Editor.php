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

    public string $body='';

    public string $hasButton;

    public string $buttonType = 'submit';

    public string $buttonLabel = 'Submit';

    public string $buttonIcon;

    public function render(): \Illuminate\Contracts\Support\Renderable {
        $body=old('body', $this->body);
        if(is_string($body)){
            $this->body = $body;
        }
        /**
         *  @phpstan-var view-string
         */
        $view='theme::livewire.editor';
        $view_params=[];
        return view($view,$view_params);
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