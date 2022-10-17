<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Models\Panels\XotBasePanel;

<<<<<<< HEAD
// --- Services --
=======
//--- Services --
>>>>>>> ede0df7 (first)

/**
 * Class HomePanel.
 */
<<<<<<< HEAD
class HomePanel extends XotBasePanel {
=======
class HomePanel extends XotBasePanel
{
>>>>>>> ede0df7 (first)
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Xot\Models\Home';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

<<<<<<< HEAD
    public function fields(): array {
=======
    public function fields(): array
    {
>>>>>>> ede0df7 (first)
        return [
        ];
    }

    /**
     * Get the tabs available.
     */
<<<<<<< HEAD
    public function tabs(): array {
=======
    public function tabs(): array
    {
>>>>>>> ede0df7 (first)
        $tabs_name = ['widget'];

        return $tabs_name;
    }

    /**
     * Get the actions available for the resource.
     */
<<<<<<< HEAD
    public function actions(Request $request = null): array {
        // $cmd = (string) request()->input('cmd');
        /**
         * @var string
         */
        $cmd = request('cmd', '');
=======
    public function actions(Request $request = null): array
    {
        $cmd = (string) request()->input('cmd');
>>>>>>> ede0df7 (first)

        return [
            new \Modules\Xot\Models\Panels\Actions\ArtisanAction($cmd),
            new Actions\TestAction(),
            new Actions\ConvertSmartyToBladeAction(),
<<<<<<< HEAD
=======
          
>>>>>>> ede0df7 (first)
        ];
    }
}
