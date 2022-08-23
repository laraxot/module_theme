<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\Form;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\View\Component;

/**
 * Class Builder.
 */
class Builder extends Component {
    public int $form_id;


    public function __construct(int $id){
        $this->form_id=$id;
    }


    public function render(): Renderable {
        $form=(object)[
            'inputs'=>[
                /*
                (object)[
                    'name'=>'submit_a_ticket',
                    'type'=>'Heading'
                ],
                */
                (object)[
                    'name'=>'name',
                    'type'=>'text',
                ],
                (object)[
                    'name'=>'email',
                    'type'=>'text',
                ],

                (object)[
                    'name'=>'country_code',
                    'type'=>'text',
                    'col_size'=>2,
                ],

                (object)[
                    'name'=>'mobile_number',
                    'type'=>'text',
                    'col_size'=>5,
                ],

                (object)[
                    'name'=>'phone',
                    'type'=>'text',
                    'col_size'=>5,
                ],
                (object)[
                    'name'=>'topic_id',
                    'type'=>'select',
                    'options'=>['paperino','pluto','zio paperone'],
                ],
                (object)[
                    'name'=>'priority',
                    'type'=>'select',
                    'options'=>['paperino','pluto','zio paperone'],
                ],
                (object)[
                    'name'=>'subject',
                    'type'=>'text',
                ],
                
                (object)[
                    'name'=>'details',
                    'type'=>'wysiwyg',
                ],
                
            ],
        ];
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::components.form.builder';
        $view_params = [
            'view' => $view,
            'form' => $form,
        ];

        return view()->make($view, $view_params);
    }
}