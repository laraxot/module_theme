<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Class Trending.
 */
<<<<<<< HEAD
class Trending extends Component {
=======
class Trending extends Component
{
>>>>>>> ede0df7 (first)
    public array $attrs = [];
    public ?string $title = null;
    public ?string $subtitle = null;
    public Collection $rows;

    /**
     * Create a new component instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct(?string $title, ?string $subtitle, Collection $rows) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->rows = $rows;
        // $this->bg = $bg;
        // $this->attrs['class'] = 'd-flex align-items-center dark-overlay bg-cover';
        // $this->attrs['style'] = 'background-image: url('.$bg.');';
=======
    public function __construct(?string $title = null, ?string $subtitle = null, Collection $rows)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->rows = $rows;
        //$this->bg = $bg;
        //$this->attrs['class'] = 'd-flex align-items-center dark-overlay bg-cover';
        //$this->attrs['style'] = 'background-image: url('.$bg.');';
>>>>>>> ede0df7 (first)
    }

    /**
     * Get the view / contents that represent the component.
     */
<<<<<<< HEAD
    public function render(): \Illuminate\Contracts\Support\Renderable {
=======
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::components.trending');
    }
}
