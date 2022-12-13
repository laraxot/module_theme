<?php

declare(strict_types=1);

return [
    // 'Getting Started' => [
    //     'url' => 'docs/getting-started',
    //     'children' => [
    //         'Customizing Your Site' => 'docs/customizing-your-site',
    //         'Navigation' => 'docs/navigation',
    //         'Algolia DocSearch' => 'docs/algolia-docsearch',
    //         'Custom 404 Page' => 'docs/custom-404-page',
    //         'Other Page' => 'docs/other-page',
    //         'Other Page 2' => 'docs/other-page-2',
    //     ],
    // ],
    // 'Other Section' => [
    //     'url' => 'docs/other-section',
    // ],
    // 'Jigsaw Docs' => 'https://jigsaw.tighten.co/docs/installation',
    'Introduction' => [
        'url' => 'docs/introduction',
    ],
    'Installation' => [
        'url' => 'docs/installation',
    ],
    'Utilizzo base' => [
        'url' => 'docs/basic-usage',
    ],

    'Input Group vs Input' => [
        'url' => 'docs/input-group-vs-input',
    ],

    'Componenti Input Group' => [
        'url' => 'docs/components-input-group',
        'children' => [
            'Text' => 'docs/components/text',
            'Textarea' => 'docs/components/textarea',
            'Integer' => 'docs/components/integer',
            'Select' => 'docs/components/select',
            'Checkbox' => 'docs/components/checkbox',
            'Radio' => 'docs/components/radio',
            'Email' => 'docs/components/email',
            'Password' => 'docs/components/password',
        ],
    ],
    'Componenti Blade' => [
        'url' => 'docs/blade-components',
        'children' => [
            'Card' => 'docs/blade_components/card',
            'Button' => 'docs/blade_components/button',
            'Breadcrumb' => 'docs/blade_components/breadcrumb',
        ],
    ],
    'Componenti Livewire' => [
        'url' => 'docs/livewire-components',
        'children' => [
            'Progress Bar' => 'docs/livewire_components/progress_bar',
            'Form Builder' => 'docs/livewire_components/form_builder',
        ],
    ],
];
