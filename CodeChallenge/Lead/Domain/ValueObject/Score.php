<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\IntValueObject;

class Score extends IntValueObject
{
    /**
     * @param int $score
     * @return Score
     */
    public static function create (int $score): Score
    {
        return new self($score);
    }
}
