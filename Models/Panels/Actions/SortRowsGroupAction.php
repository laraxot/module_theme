<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Modules\Theme\Services\ThemeService;
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class SyncInputs.
 */
class SortRowsGroupAction extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-sort"></i>';

    public function handle() {
        // $view = ThemeService::getView();

        // return $view;

        // return 'preso';
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::admin.index.acts.sort-rows-group';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}