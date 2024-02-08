<?php

namespace CodeChallenge\Shared\Domain\ValueObjects;

abstract class StringValueObject
{
    protected ?string $value;

    /**
     * @param string|null $value
     */
    public function __construct(string $value = null) {
        $this->value = $value;
    }

    /**
     * @return string|null
     */
    final public function value(): ?string
    {
        return $this->value;
    }
}
