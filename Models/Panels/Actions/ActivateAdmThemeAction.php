<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Tenant\Services\TenantService;

/**
 * Class ActivateAdmThemeAction.
 */
class ActivateAdmThemeAction extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    public ?string $theme;

    public function __construct(?string $theme)
    {
        $this->theme = $theme;
    }

    public function handle()
    {
        $parz = [
            'name' => 'xra',
            'data' => [
                'adm_theme' => $this->theme,
            ],
        ];
        TenantService::saveConfig($parz);

        return redirect()->back();
    }
}
