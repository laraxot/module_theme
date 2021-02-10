<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Support;

use Modules\Xot\View\Components\XotBaseComponent;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Class Unsplash
 * @package Modules\Theme\View\Components\Support
 */
class Unsplash extends XotBaseComponent
{
    /** @var string */
    protected string $photo;

    /** @var string */
    protected string $query;

    /** @var bool */
    protected bool $featured;

    /** @var string */
    protected string $username;

    /** @var int|null */
    protected ?int $width;

    /** @var int|null */
    protected ?int $height;

    /** @var int */
    protected int $ttl;

    public function __construct(
        string $photo = 'random',
        string $query = '',
        bool $featured = false,
        string $username = '',
        int $width = null,
        int $height = null,
        int $ttl = 3600
    ) {
        $this->photo = $photo;
        $this->query = $query;
        $this->featured = $featured;
        $this->username = $username;
        $this->width = $width;
        $this->height = $height;
        $this->ttl = $ttl;
    }

    public function render(): View
    {
        return view('theme::components.support.unsplash', [
            'url' => $this->fetchPhoto(),
        ]);
    }

    protected function fetchPhoto(): string
    {
        if (! $accessKey = config('services.unsplash.access_key')) {
            return '';
        }

        return Cache::remember('unsplash.'.$this->photo, $this->ttl, function () use ($accessKey) {
            return Http::get("https://api.unsplash.com/photos/{$this->photo}", array_filter([
                'client_id' => $accessKey,
                'query' => $this->query,
                'featured' => $this->featured,
                'username' => $this->username,
                'w' => $this->width,
                'h' => $this->height,
            ]))->json()['urls']['raw'];
        });
    }
}
