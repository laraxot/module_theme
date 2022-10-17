<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class CardSimple extends Component {
    public array $attrs = [];
    public string $type;

    public function __construct(?string $type = null) {
        $this->type = $type ?? 'default';
    }

    public function render() {
        /*
         * @phpstan-var view-string
         */
        $view = 'theme::components.card-simple.'.$this->type;
        $view_params = [];

        // return View::make($view, $view_params);
        return view($view, $view_params);
        // $res = function (array $data) use ($view) {
        // $data['componentName'];
        // $data['attributes'];
        // $data['slot'];
        // dddx($data);

        //    return $view; // /resources/views/components/post.blade.php
        // };

        // return $res;
    }
}
