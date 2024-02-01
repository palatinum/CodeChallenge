<?php

namespace CodeChallenge\Lead\Application;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\Score;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadScoreInputportInterface;
use CodeChallenge\Lead\Infrastructure\Outputport\Services\GetLeadScoreServiceOutputportInterface;

class GetLeadScoreUseCase implements GetLeadScoreInputportInterface
{
    /**
     * @var GetLeadScoreServiceOutputportInterface
     */
    private GetLeadScoreServiceOutputportInterface $getLeadScoreService;

    public function __construct(
        GetLeadScoreServiceOutputportInterface $getLeadScoreService
    )
    {
        $this->getLeadScoreService = $getLeadScoreService;
    }

    /**
     * @param Lead $lead
     * @return Score
     */
    public function __invoke(Lead $lead): Score
    {
        return $this->getLeadScoreService->getLeadScore($lead);
    }
}
