<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Alerts;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Alert.
 */
class Alert extends XotBaseComponent {
    public string $type;

    public array $attrs = [];

    public function __construct(string $type = 'alert') {
        $this->type = $type;
    }

    public function render(): View {
        return view()->make('theme::components.alerts.alert');
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
