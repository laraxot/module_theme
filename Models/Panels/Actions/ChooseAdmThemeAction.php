<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Theme\Services\ThemeService;

/**
 * Class ChooseAdmThemeAction.
 */
class ChooseAdmThemeAction extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    public function handle()
    {
        $themes = ThemeService::getThemes();
        $view_params = [
            'themes' => $themes,
        ];

        return $this->panel->view()->with($view_params);
    }
}
