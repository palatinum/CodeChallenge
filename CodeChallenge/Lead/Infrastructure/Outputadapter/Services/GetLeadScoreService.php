<?php

namespace CodeChallenge\Lead\Infrastructure\Outputadapter\Services;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\Score;
use CodeChallenge\Lead\Infrastructure\Outputport\Services\GetLeadScoreServiceOutputportInterface;
use Exception;

class GetLeadScoreService implements GetLeadScoreServiceOutputportInterface
{

    /**
     * @param Lead $lead
     * @return Score
     * @throws Exception
     */
    public function getLeadScore(Lead $lead): Score
    {
        // TODO: Implement getLeadScore() method.
        return Score::create(random_int(0, 100));
    }
}
