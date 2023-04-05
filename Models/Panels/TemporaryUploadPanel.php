<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
use Modules\Cms\Models\Panels\XotBasePanel;
// --- Services --

use Modules\Xot\Contracts\RowsContract;

class TemporaryUploadPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'TemporaryUpload';

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
    public function with(): array
    {
        return [];
    }

    public function search(): array
    {
        return [];
    }

    /**
     * on select the option id.
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @param TemporaryUpload $row
     *
     * @return int|string|null
     */
    public function optionId($row)
    {
        return $row->getKey();
    }

    /**
     * on select the option label.
     *
     * @param mixed $row
     */
    public function optionLabel($row): string
    {
        return (string) $row->title;
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?\Illuminate\Contracts\Support\Renderable
    {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public static function indexQuery(array $data, $query)
    {
        // return $query->where('user_id', $request->user()->id);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array
    {
        return [
            0 => (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            1 => (object) [
                'type' => 'String',
                'name' => 'session_id',
                'rules' => 'required',
                'comment' => null,
            ],
            2 => (object) [
                'type' => 'DateDateTime',
                'name' => 'created_at',
                'comment' => null,
            ],
            3 => (object) [
                'type' => 'String',
                'name' => 'created_by',
                'comment' => null,
            ],
            4 => (object) [
                'type' => 'DateDateTime',
                'name' => 'updated_at',
                'comment' => null,
            ],
            5 => (object) [
                'type' => 'String',
                'name' => 'updated_by',
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
