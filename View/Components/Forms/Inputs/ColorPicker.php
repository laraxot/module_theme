<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Forms\Inputs;

use Illuminate\Contracts\Support\Renderable;

/**
 * Class ColorPicker.
 */
<<<<<<< HEAD
class ColorPicker extends Input {
=======
class ColorPicker extends Input
{
>>>>>>> ede0df7 (first)
    public array $options;

    /**
     * @var string[]
     */
    protected static array $assets = ['alpine', 'pickr'];

<<<<<<< HEAD
    public function __construct(string $name, string $id = null, ?string $value = '', array $options = []) {
=======
    public function __construct(string $name, string $id = null, ?string $value = '', array $options = [])
    {
>>>>>>> ede0df7 (first)
        parent::__construct($name, $id, 'hidden', $value);

        $this->options = $options;
    }

<<<<<<< HEAD
    public function render(): Renderable {
=======
    public function render(): Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::components.forms.inputs.color-picker';

        return view()->make($view);
    }

<<<<<<< HEAD
    public function options(): array {
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

    protected function swatches(): array {
=======
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
            ], $this->options
        );
    }

    protected function swatches(): array
    {
>>>>>>> ede0df7 (first)
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
