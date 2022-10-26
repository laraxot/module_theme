<?php

declare(strict_types=1);

namespace Modules\Theme\Jobs;

use Modules\LU\Models\User;
use Modules\Theme\Contracts\HasLikeContract;

final class UnlikeJob {
    public HasLikeContract $model;
    public ?User $user;

    public function __construct(
        HasLikeContract $model,
        ?User $user
    ) {
        $this->model = $model;
        $this->user = $user;
    }

    public function handle(): void {
        $this->model->dislikedBy($this->user);
    }
}
