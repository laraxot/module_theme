<?php

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;

class Test extends Component {
    public function render() {
        $view = 'theme::livewire.test';
        $i = 1;
        $shops = [
            [
                'id' => $i++, 'category_name' => 'Books',
                'children' => [
                    [
                        'id' => $i++, 'category_name' => 'Comic Book',
                        'children' => [
                            ['id' => $i++, 'category_name' => 'Marvel Comic Book'],
                            ['id' => $i++, 'category_name' => 'DC Comic Book'],
                            ['id' => $i++, 'category_name' => 'Action comics'],
                        ],
                    ],
                    [
                        'id' => $i++, 'category_name' => 'Textbooks',
                        'children' => [
                            ['id' => $i++, 'category_name' => 'Business'],
                            ['id' => $i++, 'category_name' => 'Finance'],
                            ['id' => $i++, 'category_name' => 'Computer Science'],
                        ],
                    ],
                ],
            ],
            [
                'id' => $i++, 'category_name' => 'Electronics',
                'children' => [
                    [
                        'id' => $i++, 'category_name' => 'TV',
                        'children' => [
                            ['id' => $i++, 'category_name' => 'LED'],
                            ['id' => $i++, 'category_name' => 'Blu-ray'],
                        ],
                    ],
                    [
                        'id' => $i++, 'category_name' => 'Mobile',
                        'children' => [
                            ['id' => $i++, 'category_name' => 'Samsung'],
                            ['id' => $i++, 'category_name' => 'iPhone'],
                            ['id' => $i++, 'category_name' => 'Xiomi'],
                        ],
                    ],
                ],
            ],
        ];

        $view_params = [
            'view' => $view,
            'shops' => $shops,
        ];

        return view($view, $view_params);
    }

    public function updateOrder($a, $b = null) {
        //dddx(['a' => $a, 'b' => $b]);
    }

    public function updateChildOrder($a, $b = null) {
        dddx(['a' => $a, 'b' => $b]);
    }
}
