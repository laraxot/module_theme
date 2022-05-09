<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Dashboard;

use Exception;
use Illuminate\Database\Eloquent\Model;
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
    public function render(): \Illuminate\Contracts\Support\Renderable {
        $componentClass = '\Modules\\'.$this->area->getAttributeValue('area_define_name').'\View\Components\Dashboard\Item';

        //return $componentClass;
        if (! class_exists($componentClass)) {
            throw new Exception('not exists ['.$componentClass.']');
        }

        return app()->make($componentClass)->render();
    }

    public function shouldRender(): bool {
        return false;
    }
}
