<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Layouts;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;

/**
 * Class SocialMeta
 * @package Modules\Theme\View\Components\Layouts
 */
class SocialMeta extends XotBaseComponent
{
    /** @var string */
    public string $title;

    /** @var string */
    public string $description;

    /** @var string */
    public string $type;

    /** @var string */
    public string $card;

    /** @var string */
    public string $image;

    /** @var string */
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

    public function render(): View
    {
        return view('theme::components.layouts.social-meta');
    }
}
