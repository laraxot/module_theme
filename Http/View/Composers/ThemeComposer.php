<<<<<<< HEAD
<?php

namespace Modules\Theme\Http\View\Composers;

//use App\Repositories\UserRepository;
use Illuminate\View\View;
use Modules\Theme\Services\ThemeViewService;

/**
 * Class ThemeComposer
 * @package Modules\Theme\Http\View\Composers
 */
class ThemeComposer {
    /**
     * The user repository implementation.
     */
    protected $users;

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

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view) {
        //$view->with('count', $this->users->count());
        $theme = new ThemeViewService();
        $view->with('_theme', $theme);
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\Theme\Http\View\Composers;

//use App\Repositories\UserRepository;
use Illuminate\View\View;
use Modules\Theme\Services\ThemeViewService;

/**
 * Class ThemeComposer.
 */
class ThemeComposer {
    /**
     * The user repository implementation.
     */
    protected $users;

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

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view) {
        //$view->with('count', $this->users->count());
        $theme = new ThemeViewService();
        $view->with('_theme', $theme);
    }
}
>>>>>>> 9f0111a33322bf5ce36bbb7187f5866a7193d90f
