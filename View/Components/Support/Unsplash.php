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
<<<<<<< HEAD
            'theme::components.support.unsplash',
            [
=======
            'theme::components.support.unsplash', [
>>>>>>> ede0df7 (first)
                'url' => $this->fetchPhoto(),
            ]
        );
    }

    protected function fetchPhoto(): string {
        if (! $accessKey = config('services.unsplash.access_key')) {
            return '';
        }

        $tmp1 = Cache::remember(
<<<<<<< HEAD
            'unsplash.'.$this->photo,
            $this->ttl,
            function () use ($accessKey) {
                $tmp = Http::get(
                    "https://api.unsplash.com/photos/{$this->photo}",
                    array_filter(
=======
            'unsplash.'.$this->photo, $this->ttl, function () use ($accessKey) {
                $tmp = Http::get(
                    "https://api.unsplash.com/photos/{$this->photo}", array_filter(
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
                if (\is_array($tmp)) {
=======
                if (is_array($tmp)) {
>>>>>>> ede0df7 (first)
                    return $tmp['urls']['raw'];
                }
            }
        );

<<<<<<< HEAD
        if (! \is_string($tmp1)) {
=======
        if (! is_string($tmp1)) {
>>>>>>> ede0df7 (first)
            throw new \Exception('fetchPhoto must return string');
        }

        return $tmp1;
    }
}
