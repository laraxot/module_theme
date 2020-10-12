<?php

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;
use Modules\Xot\Services\TenantService;

//use Modules\Cart\Models\BookingItem;

class VerMenu extends Component {
    public function render() {
        $view = 'theme::livewire.ver_menu';
        $view_params = [
            'view' => $view,
            //'areas' => TenantService::model('area')->get(),
            'areas' => TenantService::model('area')->pluck('nome')->all(),
        ];
        //dddx(TenantService::model('area')->pluck('nome')->all());

        return view($view, $view_params);
    }
}
