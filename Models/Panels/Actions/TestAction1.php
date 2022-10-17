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
 * Class TestAction.
 */
<<<<<<< HEAD
class TestAction1 extends XotBasePanelAction {
    public bool $onContainer = true; // onlyContainer

    public string $icon = '<i class="fas fa-campground"></i>';

    public function handle() {
=======
class TestAction1 extends XotBasePanelAction
{
    public bool $onContainer = true; //onlyContainer

    public string $icon = '<i class="fas fa-campground"></i>';

    public function handle()
    {
>>>>>>> ede0df7 (first)
        $input = request()->input('input');
        $existings = [
            'calendar.v1', 'calendar.v2',
            'full_calendar', 'full_calendar.event',
            'datepicker', 'datetimepicker',
        ];
<<<<<<< HEAD
        $exists = \in_array($input, $existings, true);

        $view = ThemeService::getView(); // vew che dovrebbe essere
=======
        $exists = in_array($input, $existings);

        $view = ThemeService::getView(); //vew che dovrebbe essere
>>>>>>> ede0df7 (first)
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

<<<<<<< HEAD
        // return $this->panel->view()->with($view_params);
=======
        //return $this->panel->view()->with($view_params);
>>>>>>> ede0df7 (first)
    }
}
