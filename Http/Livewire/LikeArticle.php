<?php
<<<<<<< HEAD
/**
 * @see https://github.com/laravelio/laravel.io/blob/main/app/Http/Livewire/LikeArticle.php
 */
=======
>>>>>>> ede0df7 (first)

declare(strict_types=1);

namespace Modules\Theme\Http\Livewire;

<<<<<<< HEAD
use Illuminate\Contracts\Support\Renderable;
=======
>>>>>>> ede0df7 (first)
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Theme\Contracts\HasLikeContract;
use Modules\Theme\Jobs\LikeJob;
use Modules\Theme\Jobs\UnlikeJob;

<<<<<<< HEAD
/**
 * Undocumented class.
 */
final class LikeArticle extends Component {
=======
final class LikeArticle extends Component
{
>>>>>>> ede0df7 (first)
    use DispatchesJobs;

    public HasLikeContract $article;

    public bool $isSidebar = true;

    /**
     * Listener di eventi di Livewire.
     *
     * @var array
     */
    protected $listeners = ['likeToggled'];

<<<<<<< HEAD
    public function mount(HasLikeContract $article): void {
        $this->article = $article;
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
=======
    public function mount(HasLikeContract $article): void
    {
        $this->article = $article;
    }

    /**
     */
    public function render():\Illuminate\Contracts\Support\Renderable
    {
>>>>>>> ede0df7 (first)
        $view = 'theme::livewire.like-article';

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

<<<<<<< HEAD
    public function toggleLike(): void {
=======
    public function toggleLike(): void
    {
>>>>>>> ede0df7 (first)
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
<<<<<<< HEAD
    public function likeToggled() {
=======
    public function likeToggled()
    {
>>>>>>> ede0df7 (first)
        return $this->article;
    }
}
