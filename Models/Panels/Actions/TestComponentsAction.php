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
 * Class TestComponentAction.
 */
class TestComponentsAction extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-campground"></i>';

    /**
     * Undocumented function.
     *
     * @return mixed
     */
    public function handle() {
<<<<<<< HEAD
        $view = ThemeService::getView(); // vew che dovrebbe essere
=======
        $view = ThemeService::getView(); //vew che dovrebbe essere
>>>>>>> ede0df7 (first)
        $tests = [
            (object) [
                'name' => 'alert',
                'active' => false,
                'attrs' => [
                    'type' => 'success',
                    'title' => 'test',
                ],
                'text' => 'nel mezzo',
            ],
            (object) [
                'name' => 'callout',
                'active' => false,
                'attrs' => [
                    'type' => 'primary',
                    'title' => 'test',
                ],
                'text' => 'nel mezzo',
            ],
            (object) [
                'name' => 'table.datatable',
                'active' => false,
                'attrs' => [
                    'type' => 'primary',
                    'title' => 'test',
                ],
                'text' => 'nel mezzo',
            ],
            (object) [
                'name' => 'input',
                'active' => false,
                'attrs' => [
                    'type' => 'text',
                    'title' => 'test',
                ],
                'text' => 'nel mezzo',
            ],
        ];
        $i = request('i');

        $test = isset($tests[$i]) ? $tests[$i] : null;

        $view_params = [
            'view' => $view,
            'tests' => $tests,
            'test' => $test,
        ];

<<<<<<< HEAD
        // return 'rotto tutto ?['.$view.']';
=======
        //return 'rotto tutto ?['.$view.']';
>>>>>>> ede0df7 (first)

        return view()->make($view, $view_params);
        /*
        $input = request()->input('input');
        $existings = [
            'calendar.v1', 'calendar.v2',
            'full_calendar', 'full_calendar.event',
            'datepicker', 'datetimepicker',
        ];
        $exists = in_array($input, $existings);

        $view = ThemeService::getView(); //vew che dovrebbe essere
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

        //return $this->panel->view()->with($view_params);
        */
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> ede0df7 (first)
