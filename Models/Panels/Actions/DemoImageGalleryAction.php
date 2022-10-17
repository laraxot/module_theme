<?php
/**
 * --.
 */
declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

<<<<<<< HEAD
// -------- services --------
=======
//-------- services --------
>>>>>>> ede0df7 (first)

use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

<<<<<<< HEAD
// -------- bases -----------
=======
//-------- bases -----------
>>>>>>> ede0df7 (first)

/**
 * Class ImageGalleryAction.
 */
<<<<<<< HEAD
class DemoImageGalleryAction extends XotBasePanelAction {
=======
class DemoImageGalleryAction extends XotBasePanelAction
{
>>>>>>> ede0df7 (first)
    public bool $onContainer = true;
    public string $icon = '<i class="fas fa-vial"></i>';

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function handle() {
=======
    public function handle()
    {
>>>>>>> ede0df7 (first)
        $view = ThemeService::getView();

        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
