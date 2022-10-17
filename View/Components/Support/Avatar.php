<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Support;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Avatar.
 */
<<<<<<< HEAD
class Avatar extends XotBaseComponent {
=======
class Avatar extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public string $search;

    public string $src;

    public string $provider;

    public string $fallback;

<<<<<<< HEAD
    public function __construct(string $search, string $src = '', string $provider = '', string $fallback = '') {
=======
    public function __construct(string $search, string $src = '', string $provider = '', string $fallback = '')
    {
>>>>>>> ede0df7 (first)
        $this->search = $search;
        $this->src = $src;
        $this->provider = $provider;
        $this->fallback = $fallback;
    }

<<<<<<< HEAD
    public function render(): View {
        return view()->make('theme::components.support.avatar');
    }

    public function url(): string {
=======
    public function render(): View
    {
        return view()->make('theme::components.support.avatar');
    }

    public function url(): string
    {
>>>>>>> ede0df7 (first)
        if ($this->src) {
            return $this->src;
        }

        $query = http_build_query(
            array_filter(
                [
<<<<<<< HEAD
                    'fallback' => $this->fallback,
=======
                'fallback' => $this->fallback,
>>>>>>> ede0df7 (first)
                ]
            )
        );

        if ($this->provider) {
            return sprintf('https://unavatar.now.sh/%s/%s?%s', $this->provider, $this->search, $query);
        }

        return sprintf('https://unavatar.now.sh/%s?%s', $this->search, $query);
    }
}
