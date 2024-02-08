<?php

namespace CodeChallenge\Lead\Application;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\MortgageRequestAmount;
use CodeChallenge\Lead\Domain\ValueObject\PurposeMortgage;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadByIdInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadScoreInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\UpdateLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Outputport\LeadRepositoryOutputportInterface;

class UpdateLeadUseCase implements UpdateLeadInputportInterface
{
    /**
     * @var LeadRepositoryOutputportInterface
     */
    private LeadRepositoryOutputportInterface $leadRepository;
    /**
     * @var GetLeadByIdInputportInterface
     */
    private GetLeadByIdInputportInterface $getLeadByIdUseCase;
    /**
     * @var GetLeadScoreInputportInterface
     */
    private GetLeadScoreInputportInterface $getLeadScoreUseCase;

    /**
     * @param GetLeadScoreInputportInterface $getLeadScoreUseCase
     * @param LeadRepositoryOutputportInterface $leadRepository
     * @param GetLeadByIdInputportInterface $getLeadByIdUseCase
     */
    public function __construct(
        GetLeadScoreInputportInterface $getLeadScoreUseCase,
        LeadRepositoryOutputportInterface $leadRepository,
        GetLeadByIdInputportInterface $getLeadByIdUseCase
    )
    {
        $this->leadRepository = $leadRepository;
        $this->getLeadByIdUseCase = $getLeadByIdUseCase;
        $this->getLeadScoreUseCase = $getLeadScoreUseCase;
    }

    /**
     * @param int $leadId
     * @param int $mortgageRequestAmount
     * @param string $purposeMortgage
     * @return Lead|null
     */
    public function __invoke(
        int $leadId,
        int $mortgageRequestAmount,
        string $purposeMortgage
    ): ?Lead
    {
        $lead = $this->getLeadByIdUseCase->__invoke($leadId);
        if(!$lead) {
            return null;
        }
        $lead->setMortgageRequestAmount(MortgageRequestAmount::create($mortgageRequestAmount));
        $lead->setPurposeMortgage(PurposeMortgage::create($purposeMortgage));
        $score = $this->getLeadScoreUseCase->__invoke($lead);
        $lead->setScore($score);

        return $this->leadRepository->update($lead);
    }
}
