<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Theme\Contracts\HasLikeContract;
use Modules\Theme\Jobs\LikeJob;
use Modules\Theme\Jobs\UnlikeJob;

final class LikeReply extends Component {
    use DispatchesJobs;

    public HasLikeContract $reply;

    public function mount(HasLikeContract $reply): void {
        $this->reply = $reply;
    }

    public function toggleLike(): void {
        if (Auth::guest()) {
            return;
        }

        if ($this->reply->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeJob($this->reply, Auth::user()));
        } else {
            $this->dispatchSync(new LikeJob($this->reply, Auth::user()));
        }
    }
}
