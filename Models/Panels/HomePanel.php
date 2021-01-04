<?php

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Models\Panels\XotBasePanel;

//--- Services --

class HomePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Modules\Xot\Models\Home';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    public function fields() {
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
        return [
            new \Modules\Xot\Models\Panels\Actions\ArtisanAction(request()->input('cmd')),
            new Actions\TestAction(),
        ];
    }
}
