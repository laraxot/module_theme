<?php

declare(strict_types=1);

namespace Modules\Theme\Exceptions;

final class CouldNotAddUpload extends \Exception {
    public static function uuidAlreadyExists() {
        return new static('The given uuid is being used for an existing media item.');
    }
}
