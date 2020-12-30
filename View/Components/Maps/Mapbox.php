<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Maps;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

class Mapbox extends XotBaseComponent
{
    /** @var string */
    public $id;

    /** @var string */
    public $theme;

    /** @var array */
    public $options;

    /** @var array */
    public $markers;

    protected static $assets = ['alpine', 'mapbox'];

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

    public function render(): View
    {
        return view('theme::components.maps.mapbox');
    }

    public function options(): array
    {
        return array_merge([
            'container' => $this->id,
            'style' => "mapbox://styles/mapbox/{$this->theme}",
        ], $this->options);
    }
}
