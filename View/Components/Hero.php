<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
<<<<<<< HEAD
use Modules\Theme\Services\ThemeService;
=======
>>>>>>> ede0df7 (first)

/**
 * Class Hero.
 */
class Hero extends Component {
<<<<<<< HEAD
    public string $type;
=======
    public array $attrs = [];
    public ?string $title = null;
    public ?string $subtitle = null;
    public ?string $bg = null;
>>>>>>> ede0df7 (first)

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $type = 'hero') {
        $this->type = $type;
        // ThemeService::make()->add('theme::View/Components/Card/rows.scss');
=======
    public function __construct(?string $title = null, ?string $subtitle = null, ?string $bg = null) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->bg = $bg;
        $this->attrs['class'] = 'd-flex align-items-center dark-overlay bg-cover';
        $this->attrs['style'] = 'background-image: url('.$bg.');';
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
<<<<<<< HEAD
        $view = 'theme::components.hero.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
=======
        return view()->make('theme::components.hero');
>>>>>>> ede0df7 (first)
    }
}
