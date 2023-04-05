<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Theme\Services\ThemeService;

/**
 * Class ChoosePubThemeAction.
 */
class ChoosePubThemeAction extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
    public function handle()
    {
        $themes = ThemeService::getThemes();
        $view_params = [
            'themes' => $themes,
        ];

        return $this->panel->view()->with($view_params);
    }
}
