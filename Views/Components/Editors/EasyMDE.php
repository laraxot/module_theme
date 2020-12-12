<?php

declare(strict_types=1);

namespace Modules\Theme\Views\Components\Editors;

use Modules\Xot\Views\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

class EasyMDE extends XotBaseComponent
{
    /** @var string */
    public $name;

    /** @var string */
    public $id;

    /** @var array */
    public $options;

    protected static $assets = ['alpine', 'easy-mde'];

    public function __construct(string $name, string $id = null, array $options = [])
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->options = $options;
    }

    public function options(): array
    {
        return array_merge([
            'forceSync' => true,
        ], $this->options);
    }

    public function jsonOptions(): string
    {
        if (empty($this->options())) {
            return '';
        }

        return ', ...'.json_encode((object) $this->options());
    }

    public function render(): View
    {
        return view('theme::components.editors.easy-mde');
    }
}
