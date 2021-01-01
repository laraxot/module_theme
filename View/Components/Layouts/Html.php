<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Layouts;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

class Html extends XotBaseComponent
{
    /** @var string */
    protected $title;

    public function __construct(string $title = '')
    {
        $this->title = $title;
    }

    public function render(): View
    {
        return view('theme::components.layouts.html');
    }

    public function title(): string
    {
        return $this->title ?: (string) config('app.name', 'Laravel');
    }
}
