<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\StringValueObject;

class Email extends StringValueObject
{
    /**
     * @param string $email
     * @return Email
     */
    public static function create (string $email): Email
    {
        return new self($email);
    }
}
