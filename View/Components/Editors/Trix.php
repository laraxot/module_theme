<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Editors;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class Trix
 * @package Modules\Theme\View\Components\Editors
 */
class Trix extends XotBaseComponent
{
    /** @var string */
    public ?string $name;

    /** @var string */
    public string $id;

    /** @var string */
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
        return view('theme::components.editors.trix');
    }
}
