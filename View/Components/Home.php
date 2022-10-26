<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

/**
 * Class Home.
 * una schifosa prova per visualizzare una home personalizzata.
 */
class Home extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Renderable
    {
        // if (View::exists(config('xra.main_module').'::home')) {
        /*
        if (View::exists('mediamonitor::DirectoryBs5.home')) {
            dddx('aaa');

            return view()->make('mediamonitor::DirectoryBs5.home');
        } else {
            return view()->make('pub_theme::home.02');
        }
        */

        return view()->make('mediamonitor::DirectoryBs5.home');
    }
}
