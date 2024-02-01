<?php

namespace CodeChallenge\Lead\Infrastructure\Outputport;

use CodeChallenge\Lead\Domain\Lead;

interface LeadRepositoryOutputportInterface
{
    /**
     * @param Lead $lead
     * @return Lead
     */
    public function save (Lead $lead): Lead;
}
