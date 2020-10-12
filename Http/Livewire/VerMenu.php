<?php

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

//use Modules\Cart\Models\BookingItem;

class VerMenu extends Component {
    use WithPagination;

    public function render() {
        $view = 'theme::livewire.ver_menu';
        $view_params = [
            'view' => $view,
            'areas' => TenantService::model('area')->get(),
        ];

        return view($view, $view_params);
    }
}
