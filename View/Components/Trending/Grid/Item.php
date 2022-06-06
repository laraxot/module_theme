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
    // public Object $row;

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
     */
    public function render(): Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.trending.grid.item';

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
