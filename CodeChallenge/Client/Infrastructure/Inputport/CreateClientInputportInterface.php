<?php

namespace CodeChallenge\Client\Infrastructure\Inputport;

use CodeChallenge\Client\Domain\Client;

interface CreateClientInputportInterface
{
    /**
     * @param string $name
     * @param string $email
     * @param string|null $phone
     * @return CLient
     */
    public function __invoke(string $name, string $email, string $phone = null): CLient;
}
