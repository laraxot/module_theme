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
final class LikeThread extends Component {
=======
final class LikeThread extends Component
{
>>>>>>> ede0df7 (first)
    use DispatchesJobs;

    public HasLikeContract $thread;

<<<<<<< HEAD
    public function mount(HasLikeContract $thread): void {
        $this->thread = $thread;
    }

    public function toggleLike(): void {
=======
    public function mount(HasLikeContract $thread): void
    {
        $this->thread = $thread;
    }

    public function toggleLike(): void
    {
>>>>>>> ede0df7 (first)
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
