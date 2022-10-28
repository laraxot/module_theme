<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Input;

use Illuminate\Support\Str;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;
use Illuminate\View\ComponentAttributeBag;

/**
 * Undocumented class.
 */
class Group extends Component
{
    public string $tpl = 'group';
    // public string $name;
    // public string $type;
    public array $data = [];
    public array $options = [];

    /*
    public function __construct(string $name, string $type, ?array $options = null) {
        $this->name = $name;
        $this->type = $type;
        $this->options = $options ?? [];
    }
    */
    public function __construct(?array $options = null)
    {
        // $this->name = $name;
        // $this->type = $type;
        $this->options = $options ?? [];
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render()
    {
        return function (array &$data) {
            return $this->renderData($data);
        };
    }

    /**
     * @see https:// stackoverflow.com/questions/65334221/laravel-accessing-attributes-slots-within-component-classes
     */
    public function renderData(array &$data)
    {
        extract($data);
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.input.group.' . $this->tpl;

        $div_attrs = app(ComponentAttributeBag::class);
        $label_attrs = app(ComponentAttributeBag::class);
        $id = $attributes->get('id') ?? Str::slug($attributes->get('name'));


        $label_attrs = $label_attrs->merge(
            [
                'id'   => $id,
                'name' => $attributes->get('name'),
                'label' => $attributes->get('label'),
                'class' => $attributes->get('label_class'),
            ]
        );

        $input_attrs = $attributes;
        $input_attrs = $input_attrs->merge([
            // 'wire:model.lazy' => 'form_data.'.$attributes->get('name'),
            // 'options' => json_encode($this->options),
        ]);

        $div_class = 'form-group ' . $attributes->get('div_class') . ' col-' . $attributes->get('col_size') ?? '12';
        if ($attributes->get('type') == 'checkbox') {
            $div_class = 'form-check';
        }


        $div_attrs = $div_attrs->merge(
            [
                'class' => $div_class,
            ]
        );

        $view_params = [
            'view' => $view,
            'div_attrs' => $div_attrs,
            'label_attrs' => $label_attrs,
            'input_attrs' => $input_attrs,
        ];
        $view_params = array_merge($data, $view_params);
        // return View::make($view, $view_params);
        // $data['attributes']['div_attrs'] = $div_attrs;
        // $data['div_attrs'] = $div_attrs;

        return view($view, $view_params)->render();
    }

    public function shouldRender(): bool
    {
        return true;
    }
}
