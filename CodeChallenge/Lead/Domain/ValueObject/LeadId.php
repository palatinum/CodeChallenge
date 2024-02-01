<?php

namespace CodeChallenge\Lead\Domain\ValueObject;

use CodeChallenge\Shared\Domain\ValueObjects\StringValueObject;

class LeadId extends StringValueObject
{
    /**
     * @param string $leadId
     * @return LeadId
     */
    public static function create (string $leadId): LeadId
    {
        return new self($leadId);
    }
}
