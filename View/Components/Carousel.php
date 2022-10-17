<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Carousel.
 */
class Carousel extends Component {
    public string $type;
    /*
    public array $attrs = [];
    public ?string $title = null;
    public ?string $subtitle = null;
    public ?string $bg = null;
    */

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
<<<<<<< HEAD
        /* ?string $title = null, ?string $subtitle = null, ?string $bg = null, */
        string $type = 'crossfade'
    ) {
=======
        /*?string $title = null, ?string $subtitle = null, ?string $bg = null, */
        string $type = 'crossfade') {
>>>>>>> ede0df7 (first)
        $this->type = $type;
        /*
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->bg = $bg;
        $this->attrs['class'] = 'd-flex align-items-center dark-overlay bg-cover';
        $this->attrs['style'] = 'background-image: url('.$bg.');';
        */
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable {
        return view()->make('theme::components.carousel.'.$this->type);
    }
}
