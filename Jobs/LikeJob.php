<?php

declare(strict_types=1);

namespace Modules\Theme\Jobs;

use Modules\LU\Models\User;
use Modules\Theme\Contracts\HasLikeContract;
use Modules\Theme\Exceptions\CannotLikeItemException;

final class LikeJob {
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
    public function handle(): void {
        if ($this->model->isLikedBy($this->user)) {
            throw CannotLikeItemException::alreadyLiked('article');
        }

        $this->model->likedBy($this->user);
    }
}
