<?php

namespace CodeChallenge\Lead\Infrastructure\Outputport\Services;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\Score;

interface GetLeadScoreServiceOutputportInterface
{
    public function getLeadScore (Lead $lead): Score;
}
