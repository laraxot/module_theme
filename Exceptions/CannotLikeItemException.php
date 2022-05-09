<?php

declare(strict_types=1);

namespace Modules\Theme\Exceptions;

use Exception;

final class CannotLikeItemException extends Exception
{
    public static function alreadyLiked(string $item): self
    {
        return new self("The {$item} cannot be liked multiple times.");
    }
}
