<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Intervention\Image\Facades\Image;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

// use Modules\Xot\Services\SmartyService;

/**
 * Class TestAction.
 */
class TestAction extends XotBasePanelAction {
    public bool $onContainer = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        // return $this->panel->view();
        /*
        $smarty = new SmartyService();
        $smarty->convert(storage_path('test3.tpl'));
        */

        $img = Image::cache(
            function ($image) {
                $img_src = asset('img/test00.jpg');
                // dddx($img_src);//http://ptvx.local/img/test00.jpg

                return $image->make($img_src)->resize(300, 200)->greyscale();
            },
            60 * 60 * 24,
            true
        );

        dddx(
            [
                'getEncoded' => $img->getEncoded(),
                'basePath' => $img->basePath(),
                'methods' => get_class_methods($img),
            ]
        );

        return 'preso';
    }
}
