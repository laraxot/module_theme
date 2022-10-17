<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Html.
 */
class Html extends XotBaseComponent {
    protected string $title;

    public function __construct(string $title = '') {
        $this->title = $title;
    }

    public function render(): View {
        return view()->make('theme::components.layouts.html');
    }

    public function title(): string {
<<<<<<< HEAD
        if (\is_string(config('app.name', 'Laravel'))) {
=======
        if (is_string(config('app.name', 'Laravel'))) {
>>>>>>> ede0df7 (first)
            return $this->title ?: config('app.name', 'Laravel');
        } else {
            return 'NO TITLE';
        }
    }
}
