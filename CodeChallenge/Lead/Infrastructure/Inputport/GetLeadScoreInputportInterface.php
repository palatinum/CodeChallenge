<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\Score;

interface GetLeadScoreInputportInterface
{
    /**
     * @param Lead $lead
     * @return Score
     */
    public function __invoke(Lead $lead): Score;
}
