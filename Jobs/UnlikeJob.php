<?php

declare(strict_types=1);

namespace Modules\Theme\Jobs;

use Modules\LU\Models\User;
use Modules\Theme\Contracts\HasLikeContract;

<<<<<<< HEAD
final class UnlikeJob {
=======
final class UnlikeJob
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

<<<<<<< HEAD
    public function handle(): void {
=======
    public function handle(): void
    {
>>>>>>> ede0df7 (first)
        $this->model->dislikedBy($this->user);
    }
}
