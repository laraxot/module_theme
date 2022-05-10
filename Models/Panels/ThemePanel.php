<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels;

// --- Services --

use Illuminate\Http\Request;
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class ThemePanel.
 */
class ThemePanel extends XotBasePanel {
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
    public function fields(): array {
        return [
            (object) ([
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                // 'name' => 'title',
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

    public function actions(Request $request = null): array {
        return [
            new Actions\DemoImageGalleryAction(),
        ];
    }
}
