<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\Services\FileService;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Button.
 */
<<<<<<< HEAD
class Button extends XotBaseComponent {
    public array $attrs = [];

    public function __construct() {
        $this->attrs['class'] = FileService::config('pub_theme::css.forms.button');
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
class Button extends XotBaseComponent
{
    public array $attrs = [];

    public function __construct()
    {
        $this->attrs['class'] = FileService::config('pub_theme::css.forms.button');
    }

    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.forms.button';

        return view()->make($view);
    }
}
