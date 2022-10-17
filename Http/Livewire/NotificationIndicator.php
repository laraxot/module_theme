<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

final class NotificationIndicator extends Component {
    public bool $hasNotification;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = [
        'NotificationMarkedAsRead' => 'setHasNotification',
    ];

    public function render(): View {
<<<<<<< HEAD
        if (null !== Auth::user()) {
            $this->hasNotification = (bool) $this->setHasNotification(
                Auth::user()->unreadNotifications()->count()
            );
=======
        if (! is_null(Auth::user())) {
            $this->hasNotification = (bool) $this->setHasNotification(
                Auth::user()->unreadNotifications()->count()
        );
>>>>>>> ede0df7 (first)
        } else {
            $this->hasNotification = false;
        }

        return view(
<<<<<<< HEAD
            'theme::livewire.notification-indicator',
            [
=======
            'theme::livewire.notification-indicator', [
>>>>>>> ede0df7 (first)
                'hasNotification' => $this->hasNotification,
            ]
        );
    }

    public function setHasNotification(int $count): bool {
        return $count > 0;
    }
}
