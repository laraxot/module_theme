<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

<<<<<<< HEAD
class Error1 extends Component {
=======
class Error1 extends Component
{
>>>>>>> ede0df7 (first)
    public string $field;

    public string $bag;

<<<<<<< HEAD
    public function __construct(string $field, string $bag = 'default') {
=======
    public function __construct(string $field, string $bag = 'default')
    {
>>>>>>> ede0df7 (first)
        $this->field = $field;
        $this->bag = $bag;
    }

<<<<<<< HEAD
    public function render(): View {
        return view('theme::components.input.error1');
    }

    public function messages(ViewErrorBag $errors): array {
=======
    public function render(): View
    {
        return view('theme::components.input.error1');
    }

    public function messages(ViewErrorBag $errors): array
    {
>>>>>>> ede0df7 (first)
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
