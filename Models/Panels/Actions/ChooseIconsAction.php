<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Tenant\Services\TenantService;
use Modules\Theme\Services\ThemeService;

/**
 * Class ActivateAdmThemeAction.
 */
class ChooseIconsAction extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    public function handle()
    {
        $view = ThemeService::getView();
        /**
         * @var array
         */
        $icons = config('icons');

        $adm_theme = config('xra.adm_theme');

        $view_params = ['icons' => $icons[$adm_theme]];

        return view()->make($view, $view_params);
    }

    public function postHandle()
    {
        // dddx(request()->all());

        $adm_theme = config('xra.adm_theme');

        $data = request()->all();

        $parz = [
            'name' => 'icons',
            'data' => [
                $adm_theme => [
                    'tree' => $data['tree'],
                    'flags' => $data['flags'],
                ],
            ],
        ];

        TenantService::saveConfig($parz);

        return redirect()->back();
    }
}
