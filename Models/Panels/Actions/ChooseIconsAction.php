<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
use Modules\Tenant\Services\TenantService;

/**
 * Class ActivateAdmThemeAction.
 */
class ChooseIconsAction extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fa fa-edit"></i>';


    /**
     * @return mixed
     */
    public function handle()
    {
        
        $view=ThemeService::getView();

        $icons=TenantService::config('icons');  
        
        $adm_theme=config('xra.adm_theme');

        $view_params=['icons'=>$icons[$adm_theme]];        
       
        return view()->make($view, $view_params);
    }

    /**
     * @return mixed
     */
    public function postHandle()
    {

        //dddx(request()->all());

        $adm_theme=config('xra.adm_theme');

        $data=request()->all();

        $parz = [
            'name' => 'icons',
            'data' => [
                $adm_theme=>[
                    'tree' => $data['tree'],
                    'flags' => $data['flags'],
                ],
            ],
        ];

        TenantService::saveConfig($parz);

        return redirect()->back();

    }

}
