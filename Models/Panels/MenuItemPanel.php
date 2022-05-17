<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Contracts\RowsContract;
// --- Services --

use Modules\Xot\Models\Panels\XotBasePanel;

class MenuItemPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Theme\Models\MenuItem';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     */
    public function with(): array {
        return [];
    }

    public function search(): array {
        return [];
    }

    /**
     * on select the option id.
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @param Modules\Theme\Models\MenuItem $row
     *
     * @return int|string|null
     */
    public function optionId($row) {
        return $row->getKey();
    }

    /**
     * on select the option label.
     *
     * @param mixed $row
     */
    public function optionLabel($row): string {
        return (string) $row->area_define_name;
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?\Illuminate\Contracts\Support\Renderable {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public static function indexQuery(array $data, $query) {
        // return $query->where('user_id', $request->user()->id);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array {
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
    public function tabs(): array {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array {
        return [];
    }
}
