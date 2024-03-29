<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- services --------

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Theme\Services\ThemeService;

// -------- bases -----------

/**
 * Class ImageGalleryAction.
 */
class DemoImageGalleryAction extends XotBasePanelAction
{
    public bool $onContainer = true;
    public string $icon = '<i class="fas fa-vial"></i>';

    public function handle()
    {
        $view = ThemeService::getView();

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
