<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\Score;

interface GetLeadScoreInputportInterface
{
    public function __invoke(Lead $lead): Score;
}
