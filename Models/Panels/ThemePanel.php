<?php

namespace Modules\Theme\Models\Panels;

//--- Services --

use Modules\Xot\Models\Panels\XotBasePanel;

class ThemePanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Modules\Theme\Models\Theme';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    public function fields() {
        return [
            (object) ([
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'title',
                'comment' => null,
            ]),
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
        ];
    }
}
