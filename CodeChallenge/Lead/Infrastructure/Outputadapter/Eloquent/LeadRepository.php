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
            'name' => $lead->getName()->value(),
            'email' => $lead->getEmail()->value(),
            'phone' => $lead->getPhone()->value(),
        ]);
        $leadId = new LeadId($leadModel->id);
        $lead->setId($leadId);
        return $lead;
    }
}
