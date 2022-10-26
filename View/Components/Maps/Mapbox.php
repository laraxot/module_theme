<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Maps;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Mapbox.
 */
class Mapbox extends XotBaseComponent {
    public string $id;

    public string $theme;

    public array $options;

    public array $markers;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine', 'mapbox'];

    public function __construct(
        string $id = 'map',
        string $theme = 'streets-v11',
        array $options = [],
        array $markers = []
    ) {
        $this->id = $id;
        $this->theme = $theme;
        $this->options = $options;
        $this->markers = $markers;
    }

    public function render(): View {
        return view()->make('theme::components.maps.mapbox');
    }

    public function options(): array {
        return array_merge(
            [
                'container' => $this->id,
                'style' => "mapbox://styles/mapbox/{$this->theme}",
<<<<<<< HEAD
            ],
            $this->options
=======
            ], $this->options
>>>>>>> 7203e36 (up)
        );
    }
}
