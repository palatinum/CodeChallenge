<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Lead\Domain\Lead;

interface CreateLeadInputportInterface
{
    /**
     * @param int $clientId
     * @param string $email
     * @param int $mortgageRequestAmount
     * @param string $purposeMortgage
     * @return Lead
     */
    public function __invoke(
        int $clientId,
        string $email,
        int $mortgageRequestAmount,
        string $purposeMortgage,
    ): Lead;
}
