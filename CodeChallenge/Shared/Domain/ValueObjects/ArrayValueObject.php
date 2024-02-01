<?php

namespace CodeChallenge\Shared\Domain\ValueObjects;

class ArrayValueObject
{
    protected array $value;

    /**
     * @param array $value
     */
    public function __construct(array $value) {
        $this->value = $value;
    }

    /**
     * @return array
     */
    final public function value(): array
    {
        return $this->value;
    }
}
