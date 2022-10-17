<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Section;

use Illuminate\Contracts\Support\Renderable;
<<<<<<< HEAD
=======
use Illuminate\Contracts\View\View;
>>>>>>> ede0df7 (first)
use Illuminate\View\Component;

/**
 * Class Divider.
 */
class Divider extends Component {
    public array $attrs;
    public string $title;
    public string $sub_title;
    public string $link;

    public function __construct(
<<<<<<< HEAD
        ?string $section_class,
        ?string $div_class,
        string $img,
        string $title,
        string $subTitle,
        string $link = '#'
    ) {
=======
        ?string $section_class = 'py-7 position-relative dark-overlay',
        ?string $div_class = 'overlay-content text-white py-lg-5',
        string $img,
        string $title,
        string $subTitle,
        ?string $link = '#'
        ) {
>>>>>>> ede0df7 (first)
        $this->attrs['section_class'] = $section_class;
        $this->attrs['div_class'] = $div_class;
        $this->attrs['img'] = $img;
        $this->title = $title;
        $this->sub_title = $subTitle;
        $this->link = $link;
    }

    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.section.divider';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
