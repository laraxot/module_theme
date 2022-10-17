<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire\Buttons;

use Livewire\Component;

/**
 * Undocumented class.
 */
<<<<<<< HEAD
class Delete extends Component {
    public function render(): \Illuminate\Contracts\Support\Renderable {
        /**
         * @phpstan-var view-string
         */
=======
class Delete extends Component
{
    /**
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    // public function destroy($contactId) {
        // Contact::find($contactId)->delete();
    // }
=======
    //public function destroy($contactId) {
        //Contact::find($contactId)->delete();
    //}
>>>>>>> ede0df7 (first)
}
