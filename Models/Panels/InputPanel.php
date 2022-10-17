<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

use Illuminate\Http\Request;
<<<<<<< HEAD
// --- Services --
=======
//--- Services --
>>>>>>> ede0df7 (first)

use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class InputPanel.
 */
<<<<<<< HEAD
class InputPanel extends XotBasePanel {
=======
class InputPanel extends XotBasePanel
{
>>>>>>> ede0df7 (first)
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Theme\Models\Input';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * @return object[]
     */
<<<<<<< HEAD
    public function fields(): array {
=======
    public function fields(): array
    {
>>>>>>> ede0df7 (first)
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'type',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'sub_type',
                'comment' => null,
            ],
        ];
    }

    /**
     * Get the actions available for the resource.
     */
<<<<<<< HEAD
    public function actions(Request $request = null): array {
=======
    public function actions(Request $request = null): array
    {
>>>>>>> ede0df7 (first)
        return [
            new Actions\SyncInputs(),
        ];
    }
}
