<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

/**
 * Class Builder.
 */
class Builder extends Component {
    public array $data;

    public function __construct(string $disk, string $filename) {
        // $this->data = json_decode(Storage::disk($disk)->get($filename));
        $this->data = $this->makeData($disk, $filename);
    }

    public function makeData(string $disk, string $filename) {
        $tmp = json_decode(Storage::disk($disk)->get($filename));
        $data = json_decode(json_encode($tmp), true);

        foreach ($data as $key => $input) {
            if (array_key_exists('className', $input)) {
                $data[$key]['class'] = $data[$key]['className'];
                unset($data[$key]['className']);
            }
            if ($input['type'] == 'number') {
                $data[$key]['type'] = 'integer';
            }


            // options da finire per la select
            if (array_key_exists('values', $input)) {
                $mapped = Arr::map($input['values'], function ($value, $key) {
                    return [$value['label'] => $value['value']];
                });
                // $data[$key]['options'] = Arr::collapse($mapped);
                $data[$key]['options'] = "['aaa' => 'aaa', 'bbb' => 'bbb']";
                unset($data[$key]['values']);
            }
        }
        // dddx($data);

        return $data;
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
