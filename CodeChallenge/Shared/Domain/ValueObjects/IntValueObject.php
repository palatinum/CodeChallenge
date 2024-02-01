<?php

namespace CodeChallenge\Shared\Domain\ValueObjects;

abstract class IntValueObject
{
    protected int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value) {
        $this->value = $value;
    }

    /**
     * @return int
     */
    final public function value(): int
    {
        return $this->value;
    }
}
