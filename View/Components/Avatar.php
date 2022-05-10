<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

/**
 * Class Avatar.
 */
class Avatar extends Component {
    public string $type;

    public string $img_src;

    public string $size;

    public function __construct(string $type = 'circle', string $img_src = '', string $size = '') {
        $this->type = $type;
        $this->img_src = $img_src;
        $this->size = $size;
    }

    public function render(): View {
        $view = 'theme::components.avatar.circle';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
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
