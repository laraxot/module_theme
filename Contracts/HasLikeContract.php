<?php

declare(strict_types=1);

namespace Modules\Theme\Contracts;

/**
 * This interface allows models to receive replies.
 */
<<<<<<< HEAD
interface HasLikeContract {
=======
interface HasLikeContract
{
>>>>>>> ede0df7 (first)
    /**
     * @param \Modules\LU\Models\User|null $user
     *
     * @return bool
     */
    public function isLikedBy($user);

    /**
     * @param \Modules\LU\Models\User|null $user
     *
     * @return void
     */
    public function likedBy($user);

    /**
     * @param \Modules\LU\Models\User|null $user
     *
     * @return void
     */
    public function dislikedBy($user);
}
