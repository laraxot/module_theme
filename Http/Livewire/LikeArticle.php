<?php

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

use Livewire\Component;
use Modules\Theme\Jobs\LikeJob;
use Modules\Theme\Jobs\UnlikeJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Modules\Theme\Contracts\HasLikeContract;
use Illuminate\Foundation\Bus\DispatchesJobs;

final class LikeArticle extends Component {
    use DispatchesJobs;

    public Model $article;

    public bool $isSidebar = true;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = ['likeToggled'];

    public function mount(Model $article): void {
        $this->article = $article;
    }

    public function render(): \Illuminate\Contracts\Support\Renderable {
        /** 
        * @phpstan-var view-string
        */
        $view = 'theme::livewire.like-article';

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function toggleLike(): void {
        if (Auth::guest()) {
            return;
        }

        if ($this->article->isLikedBy(Auth::user())) {
            $this->dispatchSync(new UnlikeJob($this->article, Auth::user()));
        } else {
            $this->dispatchSync(new LikeJob($this->article, Auth::user()));
        }

        $this->emit('likeToggled');
    }

    /**
     * @return \Modules\Theme\Contracts\HasLikeContract
     */
    public function likeToggled() {
        return $this->article;
    }
}
