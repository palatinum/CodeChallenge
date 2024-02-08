<?php

namespace CodeChallenge\Client\Infrastructure\Outputadapter\Eloquent;

use CodeChallenge\Client\Domain\Client;
use CodeChallenge\Client\Infrastructure\Outputport\ClientRepositoryInterface;
use App\Models\Client as ClientModel;
use CodeChallenge\Shared\Domain\Client\ClientId;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @param Client $client
     * @return Client
     */
    public function save(Client $client): Client
    {
        $clientModel = ClientModel::create([
            'name' => $client->getName()->value(),
            'email' => $client->getEmail()->value(),
            'phone' => $client->getPhone()->value(),
        ]);
        $client->setClientId(ClientId::create($clientModel->id));
        return $client;
    }
}
