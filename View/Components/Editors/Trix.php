<?php

declare(strict_types=1);

namespace Modules\Theme\Views\Components\Editors;

use Modules\Xot\Views\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

class Trix extends XotBaseComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var string */
    public $styling;

    protected static $assets = ['trix'];

    public function __construct(string $name, string $id = null, string $styling = 'trix-content')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->styling = $styling;
    }

    public function render(): View
    {
        return view('theme::components.editors.trix');
    }
}
