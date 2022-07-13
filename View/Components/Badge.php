<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

/**
 * Class Avatar.
 */
class Badge extends Component {
    /**
     * Undocumented variable
     *
     * @var string
     */
    public string $type='default';


    /**
     * Undocumented function
     */
    public function __construct() {
        
    }

    /**
     * Undocumented function
     *
     * @return View
     */
    public function render(): View {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.badge.'.$this->type;
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

}