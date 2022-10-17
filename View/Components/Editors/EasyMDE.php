<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Editors;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class EasyMDE.
 */
<<<<<<< HEAD
class EasyMDE extends XotBaseComponent {
    /**
     * @var string
=======
class EasyMDE extends XotBaseComponent
{
    /**
     * 
     *
     * @var string 
>>>>>>> ede0df7 (first)
     */
    public ?string $name;

    public string $id;

    public array $options;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine', 'easy-mde'];

<<<<<<< HEAD
    public function __construct(string $name, string $id = null, array $options = []) {
=======
    public function __construct(string $name, string $id = null, array $options = [])
    {
>>>>>>> ede0df7 (first)
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->options = $options;
    }

<<<<<<< HEAD
    public function options(): array {
        return array_merge(
            [
                'forceSync' => true,
            ],
            $this->options
        );
    }

    public function jsonOptions(): string {
=======
    public function options(): array
    {
        return array_merge(
            [
            'forceSync' => true,
            ], $this->options
        );
    }

    public function jsonOptions(): string
    {
>>>>>>> ede0df7 (first)
        if (empty($this->options())) {
            return '';
        }

        return ', ...'.json_encode((object) $this->options());
    }

<<<<<<< HEAD
    public function render(): View {
=======
    public function render(): View
    {
>>>>>>> ede0df7 (first)
        return view()->make('theme::components.editors.easy-mde');
    }
}
