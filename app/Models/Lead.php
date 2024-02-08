<?php

namespace App\Models;

use CodeChallenge\Lead\Domain\ValueObject\LeadId;
use CodeChallenge\Lead\Domain\ValueObject\MortgageRequestAmount;
use CodeChallenge\Lead\Domain\ValueObject\PurposeMortgage;
use CodeChallenge\Lead\Domain\ValueObject\Score;
use CodeChallenge\Shared\Domain\Client\ClientId;
use CodeChallenge\Shared\Domain\ValueObjects\Email;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use CodeChallenge\Lead\Domain\Lead as LeadDomain;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'email',
        'mortgage_request_amount',
        'purpose_mortgage',
        'score',
    ];

    /**
     * @return LeadDomain
     */
    public function toLeadDomain (): LeadDomain
    {
        $lead = LeadDomain::create(
            ClientId::create($this->client_id),
            Email::create($this->email),
            MortgageRequestAmount::create($this->mortgage_request_amount),
            PurposeMortgage::create($this->purpose_mortgage),
        );
        $lead->setLeadId(LeadId::create($this->id));
        $lead->setScore(Score::create($this->score));

        return $lead;
    }
}
