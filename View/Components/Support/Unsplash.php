<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Support;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Unsplash.
 */
class Unsplash extends XotBaseComponent {
    protected string $photo;

    protected string $query;

    protected bool $featured;

    protected string $username;

    protected ?int $width;

    protected ?int $height;

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

    public function render(): View {
        return view()->make(
            'theme::components.support.unsplash',
            [
                'url' => $this->fetchPhoto(),
            ]
        );
    }

    protected function fetchPhoto(): string {
        if (! $accessKey = config('services.unsplash.access_key')) {
            return '';
        }

        $tmp1 = Cache::remember(
            'unsplash.'.$this->photo,
            $this->ttl,
            function () use ($accessKey) {
                $tmp = Http::get(
                    "https://api.unsplash.com/photos/{$this->photo}",
                    array_filter(
                        [
                            'client_id' => $accessKey,
                            'query' => $this->query,
                            'featured' => $this->featured,
                            'username' => $this->username,
                            'w' => $this->width,
                            'h' => $this->height,
                        ]
                    )
                )->json();
                if (\is_array($tmp)) {
                    return $tmp['urls']['raw'];
                }
            }
        );

        if (! \is_string($tmp1)) {
            throw new \Exception('fetchPhoto must return string');
        }

        return $tmp1;
    }
}
