<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Layouts;

use Illuminate\Contracts\View\View;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class SocialMeta.
 */
class SocialMeta extends XotBaseComponent {
    public string $title;

    public string $description;

    public string $type;

    public string $card;

    public string $image;

    public string $url;

    public function __construct(
        string $title,
        string $description = '',
        string $type = 'website',
        string $card = 'summary_large_image',
        string $image = '',
        string $url = ''
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->type = $type;
        $this->card = $card;
        $this->image = $image;
        $this->url = $url ?: url()->current();
    }

    public function render(): View {
        return view()->make('theme::components.layouts.social-meta');
    }
}
