<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Lead\Domain\Lead;

interface DeleteLeadInputportInterface
{
    /**
     * @param Lead $lead
     * @return bool
     */
    public function __invoke(Lead $lead): bool;
}
