<?php

namespace CodeChallenge\Client\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\StringValueObject;

class Phone extends StringValueObject
{
    /**
     * @param string|null $phone
     * @return Phone
     */
    public static function create (string $phone = null): Phone
    {
        return new self($phone);
    }
}
