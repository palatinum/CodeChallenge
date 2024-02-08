<?php

namespace CodeChallenge\Lead\Domain;

use CodeChallenge\Lead\Domain\ValueObject\LeadId;
use CodeChallenge\Lead\Domain\ValueObject\MortgageRequestAmount;
use CodeChallenge\Lead\Domain\ValueObject\PurposeMortgage;
use CodeChallenge\Lead\Domain\ValueObject\Score;
use CodeChallenge\Shared\Domain\Client\ClientId;
use CodeChallenge\Shared\Domain\ValueObjects\Email;

class Lead
{
    /**
     * @var LeadId
     */
    private LeadId $leadId;
    /**
     * @var ClientId
     */
    private ClientId $clientId;
    /**
     * @var Email
     */
    private Email $email;
    /**
     * @var MortgageRequestAmount
     */
    private MortgageRequestAmount $mortgageRequestAmount;
    /**
     * @var PurposeMortgage
     */
    private PurposeMortgage $purposeMortgage;
    /**
     * @var Score
     */
    private Score $score;

    /**
     * @param ClientId $clientId
     * @param Email $email
     * @param MortgageRequestAmount $mortgageRequestAmount
     * @param PurposeMortgage $purposeMortgage
     */
    public function __construct(
        ClientId $clientId,
        Email $email,
        MortgageRequestAmount $mortgageRequestAmount,
        PurposeMortgage $purposeMortgage,
    )
    {
        $this->leadId = LeadId::create();
        $this->clientId = $clientId;
        $this->email = $email;
        $this->mortgageRequestAmount = $mortgageRequestAmount;
        $this->purposeMortgage = $purposeMortgage;
        $this->score = Score::create();
    }

    /**
     * @param ClientId $clientId
     * @param Email $email
     * @param MortgageRequestAmount $mortgageRequestAmount
     * @param PurposeMortgage $purposeMortgage
     * @return self
     */
    public static function create (
        ClientId $clientId,
        Email $email,
        MortgageRequestAmount $mortgageRequestAmount,
        PurposeMortgage $purposeMortgage,
    ): Lead
    {
        return new self($clientId, $email, $mortgageRequestAmount, $purposeMortgage);
    }

    /**
     * @return LeadId
     */
    public function getLeadId(): LeadId
    {
        return $this->leadId;
    }

    /**
     * @param LeadId $leadId
     */
    public function setLeadId(LeadId $leadId): void
    {
        $this->leadId = $leadId;
    }

    /**
     * @return ClientId
     */
    public function getClientId(): ClientId
    {
        return $this->clientId;
    }

    /**
     * @param ClientId $clientId
     */
    public function setClientId(ClientId $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    /**
     * @return MortgageRequestAmount
     */
    public function getMortgageRequestAmount(): MortgageRequestAmount
    {
        return $this->mortgageRequestAmount;
    }

    /**
     * @param MortgageRequestAmount $mortgageRequestAmount
     */
    public function setMortgageRequestAmount(MortgageRequestAmount $mortgageRequestAmount): void
    {
        $this->mortgageRequestAmount = $mortgageRequestAmount;
    }

    /**
     * @return PurposeMortgage
     */
    public function getPurposeMortgage(): PurposeMortgage
    {
        return $this->purposeMortgage;
    }

    /**
     * @param PurposeMortgage $purposeMortgage
     */
    public function setPurposeMortgage(PurposeMortgage $purposeMortgage): void
    {
        $this->purposeMortgage = $purposeMortgage;
    }

    /**
     * @return Score
     */
    public function getScore(): Score
    {
        return $this->score;
    }

    /**
     * @param Score $score
     */
    public function setScore(Score $score): void
    {
        $this->score = $score;
    }

    /**
     * @return array
     */
    public function serializeArray(): array
    {
        return [
            'id' => $this->leadId->value(),
            'client_id' => $this->clientId->value(),
            'email' => $this->email->value(),
            'mortgage_request_amount' => $this->mortgageRequestAmount->value(),
            'purpose_mortgage' => $this->purposeMortgage->value(),
            'score' => $this->score->value(),
        ];
    }
}
