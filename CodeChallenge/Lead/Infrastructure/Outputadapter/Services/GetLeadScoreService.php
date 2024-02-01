<?php

namespace CodeChallenge\Lead\Infrastructure\Outputadapter\Services;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\Score;
use CodeChallenge\Lead\Infrastructure\Outputport\Services\GetLeadScoreServiceOutputportInterface;

class GetLeadScoreService implements GetLeadScoreServiceOutputportInterface
{

    public function getLeadScore(Lead $lead): Score
    {
        // TODO: Implement getLeadScore() method.
        return Score::create(100);
    }
}
