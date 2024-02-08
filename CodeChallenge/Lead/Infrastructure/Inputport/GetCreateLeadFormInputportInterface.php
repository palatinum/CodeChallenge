<?php

namespace CodeChallenge\Lead\Infrastructure\Inputport;

use CodeChallenge\Shared\Domain\FormData\FormData;

interface GetCreateLeadFormInputportInterface
{
    /**
     * @return FormData
     */
    public function __invoke(): FormData;
}
