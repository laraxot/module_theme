<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

// -------- models -----------
// -------- services --------
// -------- bases -----------
use Modules\Theme\Services\ThemeService;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class TestAction.
 */
class TestAction1 extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-campground"></i>';

    public function handle() {
        $input = request()->input('input');
        $existings = [
            'calendar.v1', 'calendar.v2',
            'full_calendar', 'full_calendar.event',
            'datepicker', 'datetimepicker',
        ];
        $exists = \in_array($input, $existings, true);

        $view = ThemeService::getView(); // vew che dovrebbe essere
        $view_params = [
            'view' => $view,
            'input' => $input,
            'existings' => $existings,
            'exists' => $exists,
        ];

        if ($exists) {
            $view .= '.'.$input;
        }

        return view()->make($view, $view_params);

        // return $this->panel->view()->with($view_params);
    }
}
