<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Dashboard;

use Exception;
<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> ede0df7 (first)
use Illuminate\View\Component;

/**
 * Class Widget.
 */
class Widget extends Component {
    public Model $area;

    public function __construct(Model $area) {
        $this->area = $area;
    }

    /**
     * --.
     */
<<<<<<< HEAD
    public function render(): Renderable {
        /*
        $componentClass = '\Modules\\'.$this->area->getAttributeValue('area_define_name').'\View\Components\Dashboard\Item';

        // return $componentClass;
        if (! class_exists($componentClass)) {
            throw new Exception('not exists ['.$componentClass.']');
        }
        //Cannot call method render() on mixed
        return app()->make($componentClass)->render();
        */
        return View::make('theme::components.empty');
=======
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $componentClass = '\Modules\\'.$this->area->getAttributeValue('area_define_name').'\View\Components\Dashboard\Item';

        //return $componentClass;
        if (! class_exists($componentClass)) {
            throw new Exception('not exists ['.$componentClass.']');
        }

        return app()->make($componentClass)->render();
>>>>>>> ede0df7 (first)
    }

    public function shouldRender(): bool {
        return false;
    }
}
