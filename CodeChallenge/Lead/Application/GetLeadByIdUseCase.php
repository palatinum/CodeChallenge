<?php

namespace CodeChallenge\Lead\Application;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\LeadId;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadByIdInputportInterface;
use CodeChallenge\Lead\Infrastructure\Outputport\LeadRepositoryOutputportInterface;

class GetLeadByIdUseCase implements GetLeadByIdInputportInterface
{
    /**
     * @var LeadRepositoryOutputportInterface
     */
    private LeadRepositoryOutputportInterface $leadRepository;

    public function __construct(LeadRepositoryOutputportInterface $leadRepository)
    {
        $this->leadRepository = $leadRepository;
    }

    /**
     * @param int $id
     * @return ?Lead
     */
    public function __invoke(int $id): ?Lead
    {
        $leadId = LeadId::create($id);
        return $this->leadRepository->getById($leadId);
    }
}
