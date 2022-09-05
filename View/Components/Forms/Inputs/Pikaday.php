<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;

/**
 * Class Pikaday.
 */
class Pikaday extends Input
{
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
        if (empty($this->options())) {
            return '';
        }

        return ', ...'.json_encode((object) $this->options());
    }

    public function render(): Renderable
    {
        $view = 'theme::components.forms.inputs.pikaday';

        return view()->make($view);
    }
}
