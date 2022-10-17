<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\ViewErrorBag;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Error.
 */
<<<<<<< HEAD
class Error extends XotBaseComponent {
=======
class Error extends XotBaseComponent
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
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.forms.error';

        return view()->make($view);
    }

<<<<<<< HEAD
    public function messages(ViewErrorBag $errors): array {
=======
    public function messages(ViewErrorBag $errors): array
    {
>>>>>>> ede0df7 (first)
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
