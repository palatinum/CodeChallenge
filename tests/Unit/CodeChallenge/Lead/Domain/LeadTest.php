<?php

namespace CodeChallenge\Lead\Domain;

use CodeChallenge\Lead\Domain\ValueObject\LeadId;
use CodeChallenge\Lead\Domain\ValueObject\MortgageRequestAmount;
use CodeChallenge\Lead\Domain\ValueObject\PurposeMortgage;
use CodeChallenge\Lead\Domain\ValueObject\Score;
use CodeChallenge\Shared\Domain\Client\ClientId;
use CodeChallenge\Shared\Domain\ValueObjects\Email;
use PHPUnit\Framework\TestCase;

class LeadTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreateLeadSuccess (): void
    {
        $clientId = ClientId::create(1);
        $email = Email::create('pepe@testing.com');
        $mortgageRequestAmount = MortgageRequestAmount::create(100);
        $purposeMortgage = PurposeMortgage::create('segunda-vivienda');
        $lead = Lead::create($clientId, $email, $mortgageRequestAmount, $purposeMortgage);
        $this->assertEquals(1, $lead->getClientId()->value());
        $this->assertEquals(100, $lead->getMortgageRequestAmount()->value());
        $this->assertEquals('segunda-vivienda', $lead->getPurposeMortgage()->value());
    }

    /**
     * @return void
     */
    public function testLeadIdGetSet(): void
    {
        $clientId = ClientId::create(1);
        $email = Email::create('pepe@testing.com');
        $mortgageRequestAmount = MortgageRequestAmount::create(100);
        $purposeMortgage = PurposeMortgage::create('segunda-vivienda');
        $leadId = LeadId::create(12);
        $lead = Lead::create($clientId, $email, $mortgageRequestAmount, $purposeMortgage);
        $this->assertEquals(null, $lead->getLeadId()->value());
        $lead->setLeadId($leadId);
        $this->assertEquals(12, $lead->getLeadId()->value());
    }

    /**
     * @return void
     */
    public function testLeadScoreGetSet(): void
    {
        $clientId = ClientId::create(1);
        $email = Email::create('pepe@testing.com');
        $mortgageRequestAmount = MortgageRequestAmount::create(100);
        $purposeMortgage = PurposeMortgage::create('segunda-vivienda');
        $lead = Lead::create($clientId, $email, $mortgageRequestAmount, $purposeMortgage);
        $score = Score::create(100);
        $this->assertEquals(null, $lead->getScore()->value());
        $lead->setScore($score);
        $this->assertEquals(100, $lead->getScore()->value());
    }

    /**
     * @return void
     */
    public function testSerializetoArray(): void
    {
        $expected = [
            'id' => 1,
            'client_id' => 1,
            'email' => 'pepe@testing.com',
            'mortgage_request_amount' => 23,
            'purpose_mortgage' => 'primera-vivienda',
            'score' => 500,
        ];
        $leadId = LeadId::create(1);
        $clientId = ClientId::create(1);
        $email = Email::create('pepe@testing.com');
        $mortgageRequestAmount = MortgageRequestAmount::create(23);
        $purposeMortgage = PurposeMortgage::create('primera-vivienda');
        $score = Score::create(500);
        $lead = Lead::create($clientId, $email, $mortgageRequestAmount, $purposeMortgage);
        $lead->setScore($score);
        $lead->setLeadId($leadId);
        $this->assertEquals($expected, $lead->serializeArray());
    }
}
