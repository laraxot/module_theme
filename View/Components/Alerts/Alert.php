<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Alerts;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Alert.
 */
class Alert extends XotBaseComponent
{
    public string $type;

    public array $attrs = [];

    public function __construct(string $type = 'alert')
    {
        $this->type = $type;
    }

    public function render(): View
    {
        return view()->make('theme::components.alerts.alert');
    }

    public function message(): string
    {
        $res = Arr::first($this->messages());
        if (! \is_string($res)) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }

        return $res;
    }

    public function messages(): array
    {
        // return (array) session()->get($this->type);
        return []; // ------------ TO FIX -----------------
    }

    public function exists(): bool
    {
        // return session()->has($this->type) && ! empty($this->messages());
        return false; // -------------- TO FIX --------------
    }
}
