<?php

namespace CodeChallenge\Lead\Infrastructure\Outputadapter\Eloquent;

use CodeChallenge\Lead\Domain\Lead;
use CodeChallenge\Lead\Domain\ValueObject\LeadId;
use App\Models\Lead as LeadModel;
use CodeChallenge\Lead\Infrastructure\Outputport\LeadRepositoryOutputportInterface;

class LeadRepository implements LeadRepositoryOutputportInterface
{

    /**
     * @param Lead $lead
     * @return Lead
     */
    public function save(Lead $lead): Lead
    {
        $leadModel = LeadModel::create([
            'client_id' => $lead->getClientId()->value(),
            'email' => $lead->getEmail()->value(),
            'mortgage_request_amount' => $lead->getMortgageRequestAmount()->value(),
            'purpose_mortgage' => $lead->getPurposeMortgage()->value(),
            'score' => $lead->getScore()->value(),
        ]);
        $leadId = new LeadId($leadModel->id);
        $lead->setLeadId($leadId);
        return $lead;
    }

    /**
     * @param Lead $lead
     * @return Lead
     */
    public function update (Lead $lead): Lead
    {
        LeadModel::where('id', $lead->getLeadId()->value())
            ->update([
            'mortgage_request_amount' => $lead->getMortgageRequestAmount()->value(),
            'purpose_mortgage' => $lead->getPurposeMortgage()->value(),
            'score' => $lead->getScore()->value(),
        ]);
        return $lead;
    }

    /**
     * @param LeadId $leadId
     * @return null|Lead
     */
    public function getById (LeadId $leadId): ?Lead
    {
        $leadModel = LeadModel::select(
            'id',
            'client_id',
            'email',
            'mortgage_request_amount',
            'purpose_mortgage',
            'score',
        )->find($leadId->value());

        if(!$leadModel) {
            return null;
        }

        return $leadModel->toLeadDomain();
    }

    /**
     * @param Lead $lead
     * @return bool
     */
    public function delete (Lead $lead): bool
    {
        return LeadModel::destroy($lead->getLeadId()->value());
    }
}
