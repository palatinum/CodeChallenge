<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\IntValueObject;

class LeadId extends IntValueObject
{
    /**
     * @param int|null $leadId
     * @return LeadId
     */
    public static function create (int $leadId = null): LeadId
    {
        return new self($leadId);
    }
}
