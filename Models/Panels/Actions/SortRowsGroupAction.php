<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

<<<<<<< HEAD
// -------- models -----------
// -------- services --------
// -------- bases -----------
=======
//-------- models -----------
//-------- services --------
//-------- bases -----------
>>>>>>> ede0df7 (first)
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class SyncInputs.
 */
<<<<<<< HEAD
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
=======
class SortRowsGroupAction extends XotBasePanelAction
{
    public bool $onContainer = true; //onlyContainer

    public string $icon = '<i class="fas fa-sort"></i>';

    public function handle()
    {
        //$view = ThemeService::getView();

        //return $view;

        //return 'preso';
>>>>>>> ede0df7 (first)
        $view = 'theme::admin.index.acts.sort-rows-group';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
