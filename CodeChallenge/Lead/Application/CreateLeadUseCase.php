<?php

namespace CodeChallenge\Lead\Application;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\MortgageRequestAmount;
use CodeChallenge\Lead\Domain\ValueObject\PurposeMortgage;
use CodeChallenge\Lead\Infrastructure\Inputport\CreateLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadScoreInputportInterface;
use CodeChallenge\Lead\Infrastructure\Outputport\LeadRepositoryOutputportInterface;
use CodeChallenge\Shared\Domain\Client\ClientId;
use CodeChallenge\Shared\Domain\ValueObjects\Email;

class CreateLeadUseCase implements CreateLeadInputportInterface
{
    /**
     * @var LeadRepositoryOutputportInterface
     */
    private LeadRepositoryOutputportInterface $leadRepository;
    /**
     * @var GetLeadScoreInputportInterface
     */
    private GetLeadScoreInputportInterface $getLeadScoreUseCase;

    public function __construct(
        GetLeadScoreInputportInterface $getLeadScoreUseCase,
        LeadRepositoryOutputportInterface $leadRepository
    )
    {
        $this->getLeadScoreUseCase = $getLeadScoreUseCase;
        $this->leadRepository = $leadRepository;
    }


    public function __invoke(
        int $clientId,
        string $email,
        int $mortgageRequestAmount,
        string $purposeMortgage,
    ): Lead
    {
        $lead = Lead::create(
            ClientId::create($clientId),
            Email::create($email),
            MortgageRequestAmount::create($mortgageRequestAmount),
            PurposeMortgage::create($purposeMortgage),
        );
        $score = $this->getLeadScoreUseCase->__invoke($lead);
        $lead->setScore($score);
        return $this->leadRepository->save($lead);
    }
}
