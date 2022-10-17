<?php

declare(strict_types=1);

namespace Modules\Theme\Models\Panels\Actions;

use Intervention\Image\Facades\Image;
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

<<<<<<< HEAD
// use Modules\Xot\Services\SmartyService;
=======
//use Modules\Xot\Services\SmartyService;
>>>>>>> ede0df7 (first)

/**
 * Class TestAction.
 */
<<<<<<< HEAD
class TestAction extends XotBasePanelAction {
=======
class TestAction extends XotBasePanelAction
{
>>>>>>> ede0df7 (first)
    public bool $onContainer = true;

    public string $icon = '<i class="fa fa-edit"></i>';

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function handle() {
        // return $this->panel->view();
=======
    public function handle()
    {
        //return $this->panel->view();
>>>>>>> ede0df7 (first)
        /*
        $smarty = new SmartyService();
        $smarty->convert(storage_path('test3.tpl'));
        */

        $img = Image::cache(
            function ($image) {
                $img_src = asset('img/test00.jpg');
<<<<<<< HEAD
                // dddx($img_src);//http://ptvx.local/img/test00.jpg

                return $image->make($img_src)->resize(300, 200)->greyscale();
            },
            60 * 60 * 24,
            true
=======
                //dddx($img_src);//http://ptvx.local/img/test00.jpg

                return $image->make($img_src)->resize(300, 200)->greyscale();
            }, 60 * 60 * 24, true
>>>>>>> ede0df7 (first)
        );

        dddx(
            [
<<<<<<< HEAD
                'getEncoded' => $img->getEncoded(),
                'basePath' => $img->basePath(),
                'methods' => get_class_methods($img),
=======
            'getEncoded' => $img->getEncoded(),
            'basePath' => $img->basePath(),
            'methods' => get_class_methods($img),
>>>>>>> ede0df7 (first)
            ]
        );

        return 'preso';
    }
}
