<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Lead\Domain\Lead;

interface CreateLeadInputportInterface
{
    public function __invoke(
        string $name,
        string $email,
        string $phone = null
    ): Lead;
}
