<?php

declare(strict_types=1);

namespace Modules\Theme\Http\View\Composers;

use Illuminate\View\View;
use Modules\Theme\Services\ThemeViewService;

/**
 * Class ThemeComposer.
 */
class ThemeComposer {
   

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view) {
        $theme = new ThemeViewService();
        $view->with('_theme', $theme);
    }
}
