<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Alerts;

<<<<<<< HEAD
use Exception;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Alert.
 */
<<<<<<< HEAD
class Alert extends XotBaseComponent {
=======
class Alert extends XotBaseComponent
{
>>>>>>> ede0df7 (first)
    public string $type;

    public array $attrs = [];

<<<<<<< HEAD
    public function __construct(string $type = 'alert') {
        $this->type = $type;
    }

    public function render(): View {
        return view()->make('theme::components.alerts.alert');
    }

    public function message(): string {
        $res = Arr::first($this->messages());
        if (! is_string($res)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }

        return $res;
    }

    public function messages(): array {
        // return (array) session()->get($this->type);
        return []; // ------------ TO FIX -----------------
    }

    public function exists(): bool {
        // return session()->has($this->type) && ! empty($this->messages());
        return false; // -------------- TO FIX --------------
=======
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
        return (string) Arr::first($this->messages());
    }

    public function messages(): array
    {
        return (array) session()->get($this->type);
    }

    public function exists(): bool
    {
        return session()->has($this->type) && ! empty($this->messages());
>>>>>>> ede0df7 (first)
    }
}
