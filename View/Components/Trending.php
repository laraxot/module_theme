<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Class Trending.
 */
class Trending extends Component {
    public array $attrs = [];
    public ?string $title = null;
    public ?string $subtitle = null;
    public Collection $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $title, ?string $subtitle, Collection $rows) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->rows = $rows;
        // $this->bg = $bg;
        // $this->attrs['class'] = 'd-flex align-items-center dark-overlay bg-cover';
        // $this->attrs['style'] = 'background-image: url('.$bg.');';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Illuminate\Contracts\Support\Renderable {
        return view()->make('theme::components.trending');
    }
}
