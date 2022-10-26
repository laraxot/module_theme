<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Support;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Avatar.
 */
class Avatar extends XotBaseComponent {
    public string $search;

    public string $src;

    public string $provider;

    public string $fallback;

    public function __construct(string $search, string $src = '', string $provider = '', string $fallback = '') {
        $this->search = $search;
        $this->src = $src;
        $this->provider = $provider;
        $this->fallback = $fallback;
    }

    public function render(): View {
        return view()->make('theme::components.support.avatar');
    }

    public function url(): string {
        if ($this->src) {
            return $this->src;
        }

        $query = http_build_query(
            array_filter(
                [
                    'fallback' => $this->fallback,
                ]
            )
        );

        if ($this->provider) {
            return sprintf('https://unavatar.now.sh/%s/%s?%s', $this->provider, $this->search, $query);
        }

        return sprintf('https://unavatar.now.sh/%s?%s', $this->search, $query);
    }
}
