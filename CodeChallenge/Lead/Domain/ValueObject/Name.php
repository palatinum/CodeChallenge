<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\StringValueObject;

class Name extends StringValueObject
{
    /**
     * @param string $name
     * @return Name
     */
    public static function create (string $name): Name
    {
        return new self($name);
    }
}
