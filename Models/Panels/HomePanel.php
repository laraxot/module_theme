<<<<<<< HEAD
<?php

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Models\Panels\XotBasePanel;

//--- Services --

/**
 * Class HomePanel
 * @package Modules\Theme\Models\Panels
 */
class HomePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = 'Modules\Xot\Models\Home';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static string $title = 'title';

    /**
     * @return array
     */
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
     * @param Request|null $request
     * @return array
     */
    public function actions(Request $request = null) {
        return [
            new \Modules\Xot\Models\Panels\Actions\ArtisanAction(request()->input('cmd')),
            new Actions\TestAction(),
        ];
    }
}
=======
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
        return [
            new \Modules\Xot\Models\Panels\Actions\ArtisanAction(request()->input('cmd')),
            new Actions\TestAction(),
        ];
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
