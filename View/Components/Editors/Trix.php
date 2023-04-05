<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Editors;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Trix.
 */
class Trix extends XotBaseComponent
{
    /**
     * @var string
     */
    public ?string $name;

    public string $id;

    public string $styling;

    /**
     * @var string[]
     */
    protected static array $assets = ['trix'];

    public function __construct(string $name, string $id = null, string $styling = 'trix-content')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->styling = $styling;
    }

    public function render(): View
    {
        return view()->make('theme::components.editors.trix');
    }
}
