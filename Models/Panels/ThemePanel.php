<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

<<<<<<< HEAD
// --- Services --

use Illuminate\Http\Request;
use Modules\Xot\Models\Panels\XotBasePanel;
=======
//--- Services --

use Modules\Xot\Models\Panels\XotBasePanel;
use Illuminate\Http\Request;
>>>>>>> ede0df7 (first)

/**
 * Class ThemePanel.
 */
<<<<<<< HEAD
class ThemePanel extends XotBasePanel {
=======
class ThemePanel extends XotBasePanel
{
>>>>>>> ede0df7 (first)
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\Theme\Models\Theme';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * @return object[]
     */
<<<<<<< HEAD
    public function fields(): array {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                // 'name' => 'title',
                'name' => 'name',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'type',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'description',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'keywords',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'active',
                'comment' => null,
            ],

            (object) [
                'type' => 'String',
                'name' => 'order',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'aliases',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'files',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'requires',
                'comment' => null,
            ],
=======
    public function fields(): array
    {
        return [
            (object) ([
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                //'name' => 'title',
                'name' => 'name',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'type',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'description',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'keywords',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'active',
                'comment' => null,
            ]),

            (object) ([
                'type' => 'String',
                'name' => 'order',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'aliases',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'files',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'requires',
                'comment' => null,
            ]),
>>>>>>> ede0df7 (first)

            /*
            (object) ([
                'type' => 'String',
                'name' => 'version',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'Text',
                'name' => 'txt',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'link',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'Integer',
                'name' => 'status',
                'comment' => null,
            ]),
            */
        ];
    }

<<<<<<< HEAD
    public function actions(Request $request = null): array {
=======
    public function actions(Request $request = null): array
    {
>>>>>>> ede0df7 (first)
        return [
            new Actions\DemoImageGalleryAction(),
        ];
    }
}
