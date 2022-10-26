<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Dashboard;

use Illuminate\View\Component;

class Header extends Component {
    public string $view;
    public string $title;
    public string $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        string $view, // example 'adm_theme::components.dashboard.header'
        string $title,
        string $subtitle = ''
    ) {
        $this->view = $view;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render() {
        $view = $this->view;
        $view_params = [
            'view' => $this->view,
        ];

        return view()->make($view, $view_params);
    }
}
