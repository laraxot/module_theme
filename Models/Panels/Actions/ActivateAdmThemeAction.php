<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

<<<<<<< HEAD
use Modules\Tenant\Services\TenantService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
=======
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;
use Modules\Tenant\Services\TenantService;
>>>>>>> ede0df7 (first)

/**
 * Class ActivateAdmThemeAction.
 */
<<<<<<< HEAD
class ActivateAdmThemeAction extends XotBasePanelAction {
=======
class ActivateAdmThemeAction extends XotBasePanelAction
{
>>>>>>> ede0df7 (first)
    public bool $onItem = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    public ?string $theme;

<<<<<<< HEAD
    public function __construct(?string $theme) {
=======
    public function __construct(?string $theme)
    {
>>>>>>> ede0df7 (first)
        $this->theme = $theme;
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function handle() {
=======
    public function handle()
    {
>>>>>>> ede0df7 (first)
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
