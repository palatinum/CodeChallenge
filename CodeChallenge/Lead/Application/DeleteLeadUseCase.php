<?php

namespace CodeChallenge\Lead\Application;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Infrastructure\Inputport\DeleteLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Outputport\LeadRepositoryOutputportInterface;

class DeleteLeadUseCase implements DeleteLeadInputportInterface
{
    /**
     * @var LeadRepositoryOutputportInterface
     */
    private LeadRepositoryOutputportInterface $leadRepository;

    /**
     * @param LeadRepositoryOutputportInterface $leadRepository
     */
    public function __construct(LeadRepositoryOutputportInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    /**
     * @param Lead $lead
     * @return bool
     */
    public function __invoke(Lead $lead): bool
    {
        return $this->leadRepository->delete($lead);
    }
}
