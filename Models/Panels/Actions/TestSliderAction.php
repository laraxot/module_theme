<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- services --------

use Modules\Theme\Services\ThemeService;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

// -------- bases -----------

/**
 * Class TestAction.
 */
class TestSliderAction extends XotBasePanelAction {
    public bool $onItem = true;
    public string $icon = '<i class="fas fa-vial"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        $drivers = [
            'ion',
            'bootstrap',
            'noui',
        ];
        $i = request('i', 0);

        $view = ThemeService::getView();

        $view_params = [
            'view' => $view,
            'drivers' => $drivers,
            'driver' => $drivers[$i],
        ];

        return view()->make($view, $view_params);
    }
}