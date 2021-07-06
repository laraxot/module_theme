<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Models\Panels\XotBasePanel;

//--- Services --

/**
 * Class HomePanel.
 */
class HomePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Xot\Models\Home';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    public function fields(): array {
        return [
        ];
    }

    /**
     * Get the tabs available.
     *
     * @return array
     */
    public function tabs() {
        $tabs_name = ['widget'];

        return $tabs_name;
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(Request $request = null) {
        $cmd = (string) request()->input('cmd');

        return [
            new \Modules\Xot\Models\Panels\Actions\ArtisanAction($cmd),
            new Actions\TestAction(),
            new Actions\ConvertSmartyToBladeAction(),
        ];
    }
}