<?php

namespace CodeChallenge\Shared\Domain\ValueObjects;

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
