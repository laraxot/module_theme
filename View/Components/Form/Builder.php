<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

/**
 * Class Builder.
 */
class Builder extends Component {
    public array $data;

    public function __construct(string $disk, string $filename) {
        $this->data = json_decode(Storage::disk($disk)->get($filename));
    }

    public function render(): Renderable {
        $form = (object) [
            'inputs' => [
                /*
                (object)[
                    'name'=>'submit_a_ticket',
                    'type'=>'Heading'
                ],
                */
                (object) [
                    'name' => 'name',
                    'type' => 'text',
                ],
                (object) [
                    'name' => 'email',
                    'type' => 'text',
                ],

                (object) [
                    'name' => 'country_code',
                    'type' => 'text',
                    'col_size' => 2,
                ],

                (object) [
                    'name' => 'mobile_number',
                    'type' => 'text',
                    'col_size' => 5,
                ],

                (object) [
                    'name' => 'phone',
                    'type' => 'text',
                    'col_size' => 5,
                ],
                (object) [
                    'name' => 'topic_id',
                    'type' => 'select',
                    'options' => ['paperino', 'pluto', 'zio paperone'],
                ],
                (object) [
                    'name' => 'priority',
                    'type' => 'select',
                    'options' => ['paperino', 'pluto', 'zio paperone'],
                ],
                (object) [
                    'name' => 'subject',
                    'type' => 'text',
                ],

                (object) [
                    'name' => 'details',
                    'type' => 'wysiwyg',
                ],
            ],
        ];
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::components.form.builder';
        $view_params = [
            'view' => $view,
            // 'form' => $form,
            'form' => $this->data,
        ];

        return view()->make($view, $view_params);
    }
}
