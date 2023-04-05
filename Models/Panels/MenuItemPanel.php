<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Cms\Models\Panels\XotBasePanel;
// --- Services --

use Modules\Theme\Models\MenuItem;

class MenuItemPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = MenuItem::class;
    public MenuItem $row;

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array
    {
        return [
            0 => (object) [
                'type' => 'String',
                'name' => 'label',
                'rules' => 'required',
                'comment' => null,
            ],
            1 => (object) [
                'type' => 'String',
                'name' => 'link',
                'rules' => 'required',
                'comment' => null,
            ],
            2 => (object) [
                'type' => 'Bigint',
                'name' => 'parent',
                'rules' => 'required',
                'comment' => null,
            ],
            3 => (object) [
                'type' => 'Integer',
                'name' => 'sort',
                'rules' => 'required',
                'comment' => null,
            ],
            4 => (object) [
                'type' => 'String',
                'name' => 'class',
                'comment' => null,
            ],
            5 => (object) [
                'type' => 'Bigint',
                'name' => 'menu',
                'rules' => 'required',
                'comment' => null,
            ],
            6 => (object) [
                'type' => 'Integer',
                'name' => 'depth',
                'rules' => 'required',
                'comment' => null,
            ],
            7 => (object) [
                'type' => 'Integer',
                'name' => 'role_id',
                'rules' => 'required',
                'comment' => null,
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [];
    }
}
