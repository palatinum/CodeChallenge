<?php

namespace CodeChallenge\Lead\Application;

use CodeChallenge\Lead\Infrastructure\Inputport\GetCreateLeadFormInputportInterface;
use CodeChallenge\Shared\Domain\FormData\FormData;

class GetCreateLeadFormUseCase implements GetCreateLeadFormInputportInterface
{
    /**
     * @return FormData
     */
    public function __invoke(): FormData
    {
        return FormData::create();
    }
}
