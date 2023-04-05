<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Illuminate\Support\Collection;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\Theme\Services\ThemeService;

/**
 * Class TryFormBuilderAction.
 */
class TryFormBuilder5Action extends XotBasePanelAction
{
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-campground"></i>5';

    public Collection $components;

    /**
     * Undocumented function.
     *
     * @return mixed
     */
    public function handle()
    {
        $view = ThemeService::getView();

        $view_params = [
        ];

        return view()->make($view, $view_params);
    }
}
