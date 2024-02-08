<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Lead\Domain\Lead;

interface GetLeadByIdInputportInterface
{
    /**
     * @param int $leaId
     * @return ?Lead
     */
    public function __invoke(int $leaId): ?Lead;
}
