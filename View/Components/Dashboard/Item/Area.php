<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Dashboard\Item;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Modules\LU\Models\Area as ModelArea;
use Modules\Xot\Services\FileService;

// use Nwidart\Modules\Facades\Module;

// use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Area.
 */
class Area extends Component
{
    public ModelArea $area;

    /**
     * Undocumented function.
     */
    public function __construct(ModelArea $area)
    {
        $this->area = $area;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /*
        try {
            $module = Module::find($this->area->area_define_name);
        } catch (Exception $e) {
            dddx($e);
        }
        */
        $ns = strtolower($this->area->area_define_name);
        // $view = 'theme::components.dashboard.item.area';
        /**
         * @phpstan-var view-string
         */
        $view = $ns.'::admin.dashboard.item';
        FileService::viewCopy('theme::layouts.default.admin.dashboard.item', $view);

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function shouldRender(): bool
    {
        return true;
    }
}
