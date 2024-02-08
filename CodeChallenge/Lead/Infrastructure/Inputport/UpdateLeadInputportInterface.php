<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Lead\Domain\Lead;

interface UpdateLeadInputportInterface
{
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
    ): ?Lead;
}
