<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Theme\Contracts\HasLikeContract;
use Modules\Theme\Jobs\LikeJob;
use Modules\Theme\Jobs\UnlikeJob;

<<<<<<< HEAD
final class LikeReply extends Component {
=======
final class LikeReply extends Component
{
>>>>>>> ede0df7 (first)
    use DispatchesJobs;

    public HasLikeContract $reply;

<<<<<<< HEAD
    public function mount(HasLikeContract $reply): void {
        $this->reply = $reply;
    }

    public function toggleLike(): void {
=======
    public function mount(HasLikeContract $reply): void
    {
        $this->reply = $reply;
    }

    public function toggleLike(): void
    {
>>>>>>> ede0df7 (first)
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
