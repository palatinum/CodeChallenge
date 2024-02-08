<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\IntValueObject;

class Score extends IntValueObject
{
    /**
     * @param int|null $score
     * @return Score
     */
    public static function create (int $score = null): Score
    {
        return new self($score);
    }
}
