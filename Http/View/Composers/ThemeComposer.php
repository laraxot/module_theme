<?php

declare(strict_types=1);

namespace Modules\Theme\Http\View\Composers;

<<<<<<< HEAD
=======
//use App\Repositories\UserRepository;
>>>>>>> ede0df7 (first)
use Illuminate\View\View;
use Modules\Theme\Services\ThemeViewService;

/**
 * Class ThemeComposer.
 */
<<<<<<< HEAD
class ThemeComposer {
=======
class ThemeComposer
{
    /**
     * The user repository implementation.
     */
    //protected $users;

    /**
     * Create a new profile composer.
     *
     * @param \App\Repositories\UserRepository $users
     *
     * @return void
     */
    /*
    public function __construct(UserRepository $users)
    {
        // Dependencies automatically resolved by service container...
        $this->users = $users;
    }
    */

>>>>>>> ede0df7 (first)
    /**
     * Bind data to the view.
     *
     * @return void
     */
<<<<<<< HEAD
    public function compose(View $view) {
=======
    public function compose(View $view)
    {
        //$view->with('count', $this->users->count());
>>>>>>> ede0df7 (first)
        $theme = new ThemeViewService();
        $view->with('_theme', $theme);
    }
}
