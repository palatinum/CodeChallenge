<?php

namespace CodeChallenge\Shared\Domain\ValueObjects;

use DateTime;

abstract class DateTimeValueObject
{
    /**
     * @var DateTime
     */
    protected DateTime $value;

    /**
     * @param DateTime $value
     */
    public function __construct(DateTime $value) {
        $this->value = $value;
    }

    /**
     * @return DateTime
     */
    final public function value(): DateTime
    {
        return $this->value;
    }
}
