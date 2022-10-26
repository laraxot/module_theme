<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Closure;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;
use Illuminate\View\DynamicComponent;

/**
 * Class Faq.
 */
class Dynamic extends DynamicComponent
{
    public array $attrs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $component, array $attrs = [])
    {
        $this->component = $component;
        $this->attrs = $attrs;
    }

    /**
     * Undocumented function.
     *
     * @return Renderable|Closure
     */
    public function render()
    {
        $template = <<<'EOF'
        <?php extract(collect($attributes->merge($attrs)->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
{{ props }}
<x-{{ component }} {{ bindings }} {{ attributes }}>
    {{ slots }}
    {{ defaultSlot }}
</x-{{ component }}>
EOF;

        return function ($data) use ($template) {
            $bindings = $this->bindings($class = $this->classForComponent());

            return str_replace(
                [
                    '{{ component }}',
                    '{{ props }}',
                    '{{ bindings }}',
                    '{{ attributes }}',
                    '{{ slots }}',
                    '{{ defaultSlot }}',
                ],
                [
                    $this->component,
                    $this->compileProps($bindings),
                    $this->compileBindings($bindings),
                    '{{ $attributes->merge($attrs) }}',
                    $this->compileSlots($data['__laravel_slots']),
                    '{{ $slot ?? "" }}',
                ],
                $template
            );
        };
    }
}
