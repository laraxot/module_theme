<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Avatar.
 */
class Avatar extends XotBaseComponent {
    /** @var string */
    public string $type;
    /** @var string */
    public string $img_src;
    /** @var string */
    public string $size;

    public function __construct(string $type = 'circle', string $img_src = null, string $size = null) {
        $this->type = $type;
        $this->img_src = $img_src;
        $this->size = $size;
    }

    public function render(): View {
        return view('theme::components.avatar.circle');
    }

    public function message(): string {
        return (string) Arr::first($this->messages());
    }

    public function messages(): array {
        return (array) session()->get($this->type);
    }

    public function exists(): bool {
        return session()->has($this->type) && ! empty($this->messages());
    }
}