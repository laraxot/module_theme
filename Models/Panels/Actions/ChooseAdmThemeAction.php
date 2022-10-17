<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class ChooseAdmThemeAction.
 */
<<<<<<< HEAD
class ChooseAdmThemeAction extends XotBasePanelAction {
=======
class ChooseAdmThemeAction extends XotBasePanelAction
{
>>>>>>> ede0df7 (first)
    public bool $onItem = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function handle() {
=======
    public function handle()
    {
>>>>>>> ede0df7 (first)
        $themes = ThemeService::getThemes();
        $view_params = [
            'themes' => $themes,
        ];

        return $this->panel->view()->with($view_params);
    }
}
