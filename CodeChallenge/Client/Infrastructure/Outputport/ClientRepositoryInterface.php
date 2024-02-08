<?php

namespace CodeChallenge\Client\Infrastructure\Outputport;

use CodeChallenge\Client\Domain\Client;

interface ClientRepositoryInterface
{
    /**
     * @param Client $client
     * @return Client
     */
    public function save(Client $client): Client;
}
