<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Editors;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Trix.
 */
<<<<<<< HEAD
class Trix extends XotBaseComponent {
    /**
     * @var string
=======
class Trix extends XotBaseComponent
{
    /**
     * 
     *
     * @var string 
>>>>>>> ede0df7 (first)
     */
    public ?string $name;

    public string $id;

    public string $styling;

    /**
     * @var string[]
     */
    protected static array $assets = ['trix'];

<<<<<<< HEAD
    public function __construct(string $name, string $id = null, string $styling = 'trix-content') {
=======
    public function __construct(string $name, string $id = null, string $styling = 'trix-content')
    {
>>>>>>> ede0df7 (first)
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->styling = $styling;
    }

<<<<<<< HEAD
    public function render(): View {
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::components.editors.trix');
    }
}
