<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class ContentSelectionAndHighlighting.
 */
class ContentSelectionAndHighlighting extends Component {
    public string $content;
    public string $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $content, string $text) {
        $this->content = $content;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.content_selection_and_highlighting.'.$this->content;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
