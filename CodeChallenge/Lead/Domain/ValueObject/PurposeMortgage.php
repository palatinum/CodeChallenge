<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\StringValueObject;

class PurposeMortgage extends StringValueObject
{
    /**
     * @param string $purposeMortgage
     * @return PurposeMortgage
     */
    public static function create (string $purposeMortgage): PurposeMortgage
    {
        return new self($purposeMortgage);
    }
}
