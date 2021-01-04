<?php

namespace Modules\Theme\Http\View\Composers;

//use App\Repositories\UserRepository;
use Illuminate\View\View;
use Modules\Theme\Services\ThemeViewService;

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
