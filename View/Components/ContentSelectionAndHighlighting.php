<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\View\Component;

/**
 * Class ContentSelectionAndHighlighting.
 */
<<<<<<< HEAD
class ContentSelectionAndHighlighting extends Component {
=======
class ContentSelectionAndHighlighting extends Component
{
>>>>>>> ede0df7 (first)
    public string $content;
    public string $text;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(string $content, string $text) {
=======
    public function __construct(string $content, string $text)
    {
>>>>>>> ede0df7 (first)
        $this->content = $content;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.content_selection_and_highlighting.'.$this->content;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
