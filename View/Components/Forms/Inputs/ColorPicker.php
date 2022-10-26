<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;

/**
 * Class ColorPicker.
 */
class ColorPicker extends Input
{
    public array $options;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine', 'pickr'];

    public function __construct(string $name, string $id = null, ?string $value = '', array $options = [])
    {
        parent::__construct($name, $id, 'hidden', $value);

        $this->options = $options;
    }

    public function render(): Renderable
    {
        $view = 'theme::components.forms.inputs.color-picker';

        return view()->make($view);
    }

    public function options(): array
    {
        return array_merge(
            [
                'el' => '#'.$this->id,
                'default' => $this->value,
                'theme' => 'classic',
                'swatches' => $this->swatches(),
                'components' => [
                    'preview' => true,
                    'interaction' => [
                        'hex' => true,
                        'input' => true,
                        'clear' => true,
                        'save' => true,
                    ],
                ],
            ],
            $this->options
        );
    }

    protected function swatches(): array
    {
        return [
            '000000',
            'A0AEC0',
            'F56565',
            'ED8936',
            'ECC94B',
            '48BB78',
            '38B2AC',
            '4299E1',
            '667EEA',
            '9F7AEA',
            'ED64A6',
            'FFFFFF',
        ];
    }
}
