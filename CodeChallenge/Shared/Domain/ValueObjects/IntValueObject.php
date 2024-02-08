<?php

namespace CodeChallenge\Shared\Domain\ValueObjects;

abstract class IntValueObject
{
    private ?int $value;

    /**
     * @param int|null $value
     */
    public function __construct(int $value = null) {
        $this->value = $value;
    }

    /**
     * @return int|null
     */
    final public function value(): ?int
    {
        return $this->value;
    }
}
