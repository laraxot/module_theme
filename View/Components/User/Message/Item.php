<?php

declare(strict_types=1);

namespace Modules\Theme\View\Components\User\Message;

use Illuminate\Contracts\Support\Renderable;
use Modules\Xot\View\Components\XotBaseComponent;

/**
 * Class Item.
 * nb: funziona in directorybs5 ma non in adminlte.
 */
class Item extends XotBaseComponent {
    public array $attrs;

<<<<<<< HEAD
    public function __construct(string $id, string $sender, string $avatarpath, string $avataralt, string $roomsnumber, string $receiptdate) {
=======
    public function __construct(string $id = 'users-message-item-0', string $sender, string $avatarpath, string $avataralt, string $roomsnumber, string $receiptdate) {
>>>>>>> ede0df7 (first)
        $this->attrs['id'] = $id;
        $this->attrs['sender'] = $sender;
        $this->attrs['avatarpath'] = $avatarpath;
        $this->attrs['avataralt'] = $avataralt;
        $this->attrs['roomsnumber'] = $roomsnumber;
        $this->attrs['receiptdate'] = $receiptdate;
    }

    public function render(): Renderable {
<<<<<<< HEAD
        /**
         * @phpstan-var view-string
         */
=======
>>>>>>> ede0df7 (first)
        $view = 'theme::components.users.message.item';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }
}
