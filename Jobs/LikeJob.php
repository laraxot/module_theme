<?php

declare(strict_types=1);

namespace Modules\Theme\Jobs;

use Modules\LU\Models\User;
use Modules\Theme\Contracts\HasLikeContract;
use Modules\Theme\Exceptions\CannotLikeItemException;

<<<<<<< HEAD
final class LikeJob {
=======
final class LikeJob
{
>>>>>>> ede0df7 (first)
    public HasLikeContract $model;
    public ?User $user;

    public function __construct(
        HasLikeContract $model,
        ?User $user
    ) {
        $this->model = $model;
        $this->user = $user;
    }

    /**
     * @throws CannotLikeItemException
     */
<<<<<<< HEAD
    public function handle(): void {
=======
    public function handle(): void
    {
>>>>>>> ede0df7 (first)
        if ($this->model->isLikedBy($this->user)) {
            throw CannotLikeItemException::alreadyLiked('article');
        }

        $this->model->likedBy($this->user);
    }
}
