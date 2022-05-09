<?php
/**
 * https://cagilo.github.io/docs/meta/.
 */

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Meta extends Component
{
    public string $title;
    public string $description;
    public string $author;
    public string $robots;
    public string $keywords;
    public string $type;
    public string $card;
    public string $image;
    public string $url;

    /**
     * Undocumented function.
     */
    public function __construct(
        string $title = '',
        string $description = '',
        string $keywords = '',
        string $author = '',
        string $robots = '',
        string $type = 'website',
        string $card = 'summary_large_image',
        string $image = '',
        string $url = ''
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->author = $author;
        $this->robots = $robots;
        $this->type = $type;
        $this->card = $card;
        $this->image = $image;
        $this->url = $url ?: url()->current();
    }

    /**
     * Undocumented function.
     */
    public function render(): View
    {
        return view('theme::components.meta');
    }
}
