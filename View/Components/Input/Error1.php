<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Error1 extends Component {
    public string $field;

    public string $bag;

    public function __construct(string $field, string $bag = 'default') {
        $this->field = $field;
        $this->bag = $bag;
    }

    public function render(): View {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.error1';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function messages(ViewErrorBag $errors): array {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
