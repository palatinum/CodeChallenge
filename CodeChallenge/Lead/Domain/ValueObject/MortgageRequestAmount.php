<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\IntValueObject;

class MortgageRequestAmount extends IntValueObject
{
    /**
     * @param int|null $leadId
     * @return LeadId
     */
    public static function create (int $leadId = null): MortgageRequestAmount
    {
        return new self($leadId);
    }
}
