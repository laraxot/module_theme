<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Markdown;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class ToC.
 */
<<<<<<< HEAD
class ToC extends XotBaseComponent {
    public string $url;

    public function __construct(string $url = null) {
        $this->url = $url ?? '';
    }

    public function render(): View {
        return view()->make('theme::components.markdown.toc');
    }

    public function items(string $markdown): Collection {
=======
class ToC extends XotBaseComponent
{
    public string $url;

    public function __construct(string $url = null)
    {
        $this->url = $url ?? '';
    }

    public function render(): View
    {
        return view()->make('theme::components.markdown.toc');
    }

    public function items(string $markdown): Collection
    {
>>>>>>> ede0df7 (first)
        // Remove code blocks which might contain headers.
        $markdown = preg_replace('(```[a-z]*\n[\s\S]*?\n```)', '', $markdown).'';

        return collect(explode(PHP_EOL, $markdown))
            ->reject(
                function (string $line) {
                    // Only search for level 2 and 3 headings.
                    return ! Str::startsWith($line, '## ') && ! Str::startsWith($line, '### ');
                }
            )
            ->map(
                function (string $line) {
                    return [
<<<<<<< HEAD
                        'level' => \strlen(trim(Str::before($line, '# '))) + 1,
                        'title' => $title = trim(Str::after($line, '# ')),
                        'anchor' => Str::slug($title),
=======
                    'level' => strlen(trim(Str::before($line, '# '))) + 1,
                    'title' => $title = trim(Str::after($line, '# ')),
                    'anchor' => Str::slug($title),
>>>>>>> ede0df7 (first)
                    ];
                }
            );
    }
}
