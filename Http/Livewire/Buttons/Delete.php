<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Buttons;

use Livewire\Component;

/**
 * Undocumented class.
 */
class Delete extends Component
{
    public function render(): \Illuminate\Contracts\Support\Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'theme::livewire.buttons.delete';
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    /*
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    // public function destroy($contactId) {
        // Contact::find($contactId)->delete();
    // }
}
