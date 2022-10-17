<?php

declare(strict_types=1);

namespace Modules\Theme\Exceptions;

use Exception;

final class TemporaryUploadDoesNotBelongToCurrentSession extends Exception {
    public static function create(): self {
        return new static('The session id of the given temporary upload does not match the current session id.');
    }
}
