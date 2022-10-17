<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class NotificationCount extends Component {
    public int $count;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = [
        'NotificationMarkedAsRead' => 'updateCount',
    ];

    public function render(): Renderable {
<<<<<<< HEAD
        if (null !== Auth::user()) {
=======
        if (! is_null(Auth::user())) {
>>>>>>> ede0df7 (first)
            $this->count = Auth::user()->unreadNotifications()->count();
        } else {
            $this->count = 0;
        }
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.notification_count';
        $view_params = [
            'count' => $this->count,
        ];

        return view()->make($view, $view_params);
    }

    public function updateCount(int $count): int {
        return $count;
    }
}
