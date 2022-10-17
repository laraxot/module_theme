<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;

/**
 * Class Pikaday.
 */
<<<<<<< HEAD
class Pikaday extends Input {
=======
class Pikaday extends Input
{
>>>>>>> ede0df7 (first)
    public string $format;

    public string $placeholder;

    public array $options;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine', 'moment', 'pikaday'];

    public function __construct(
        string $name,
        string $id = null,
        ?string $value = '',
        string $format = 'DD/MM/YYYY',
        string $placeholder = null,
        array $options = []
    ) {
        parent::__construct($name, $id, 'text', $value);

        $this->format = $format;
        $this->placeholder = $placeholder ?? $format;
        $this->options = $options;
    }

<<<<<<< HEAD
    public function options(): array {
        return array_merge(
            [
                'format' => $this->format,
            ],
            $this->options
        );
    }

    public function jsonOptions(): string {
=======
    public function options(): array
    {
        return array_merge(
            [
            'format' => $this->format,
            ], $this->options
        );
    }

    public function jsonOptions(): string
    {
>>>>>>> ede0df7 (first)
        if (empty($this->options())) {
            return '';
        }

        return ', ...'.json_encode((object) $this->options());
    }

<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.forms.inputs.pikaday';

        return view()->make($view);
    }
}
