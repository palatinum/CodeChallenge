<?php

namespace CodeChallenge\Client\Application;

use CodeChallenge\Client\Domain\Client;
use CodeChallenge\Client\Domain\ValueObject\Name;
use CodeChallenge\Client\Domain\ValueObject\Phone;
use CodeChallenge\Client\Infrastructure\Inputport\CreateClientInputportInterface;
use CodeChallenge\Client\Infrastructure\Outputport\ClientRepositoryInterface;
use CodeChallenge\Shared\Domain\ValueObjects\Email;

class CreateClientUseCase implements CreateClientInputportInterface
{
    /**
     * @var ClientRepositoryInterface
     */
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string|null $phone
     * @return Client
     */
    public function __invoke(string $name, string $email, string $phone = null): CLient
    {
        $client = Client::create(
            Name::create($name),
            Email::create($email),
            Phone::create($phone),
        );
        return $this->clientRepository->save($client);
    }
}
