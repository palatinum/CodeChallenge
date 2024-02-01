<?php

namespace CodeChallenge\Lead\Application;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\Email;
use CodeChallenge\Lead\Domain\ValueObject\Name;
use CodeChallenge\Lead\Domain\ValueObject\Phone;
use CodeChallenge\Lead\Infrastructure\Inputport\CreateLeadInputportInterface;
use CodeChallenge\Lead\Infrastructure\Inputport\GetLeadScoreInputportInterface;
use CodeChallenge\Lead\Infrastructure\Outputport\LeadRepositoryOutputportInterface;

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

    /**
     * @param string $name
     * @param string $email
     * @param string|null $phone
     * @return Lead
     */
    public function __invoke(
        string $name,
        string $email,
        string $phone = null
    ): Lead
    {
        $lead = Lead::create(
            Name::create($name),
            Email::create($email),
            Phone::create($phone)
        );
        $score = $this->getLeadScoreUseCase->__invoke($lead);
        $lead->setScore($score);
        return $this->leadRepository->save($lead);
    }
}
