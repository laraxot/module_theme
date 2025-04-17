<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Theme\Contracts\HasLikeContract;
use Modules\Theme\Jobs\LikeJob;
use Modules\Theme\Jobs\UnlikeJob;

final class LikeThread extends Component
{
    use DispatchesJobs;

    public HasLikeContract $thread;

    public function mount(HasLikeContract $thread): void
    {
        $this->thread = $thread;
    }

    public function toggleLike(): void
    {
        if (Auth::guest()) {
            return;
        }

        if ($this->thread->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeJob($this->thread, Auth::user()));
        } else {
            $this->dispatchSync(new LikeJob($this->thread, Auth::user()));
        }
    }
}
