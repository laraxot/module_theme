<?php

declare(strict_types=1);

namespace Modules\Theme\Exceptions;

use Exception;

<<<<<<< HEAD
final class CannotLikeItemException extends Exception {
    public static function alreadyLiked(string $item): self {
=======
final class CannotLikeItemException extends Exception
{
    public static function alreadyLiked(string $item): self
    {
>>>>>>> ede0df7 (first)
        return new self("The {$item} cannot be liked multiple times.");
    }
}
