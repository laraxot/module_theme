<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Trending\Grid;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Modules\Theme\Services\ThemeService;

/**
 * Class Item.
 */
class Item extends Component {
    public array $attrs = [];
    public ?string $name = null;
    public string $image = '';
    public ?string $class = null;
<<<<<<< HEAD
    // public Object $row;
=======
    //public Object $row;
>>>>>>> ede0df7 (first)

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(?string $name = null, ?string $image = null, ?string $class = null, ?object $row = null) {
        $this->name = $name;
        if (isset($image)) {
            $this->image = $image;
        }
        $this->class = $class;
        if (isset($row)) {
            $data = get_object_vars($row);
            foreach ($data as $k => $v) {
                $this->{$k} = $v;
            }
            /*
            $this->name = $row->name;
            $this->image = $row->image;
            $this->class = $row->class;
            */
        }
        if (Str::startsWith($this->image, 'img')) {
            $this->image = ThemeService::asset($this->image);
        }
    }

    /**
     * Undocumented function.
<<<<<<< HEAD
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
     *
     * @return Renderable
     */
    public function render(): Renderable {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.trending.grid.item';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> ede0df7 (first)
