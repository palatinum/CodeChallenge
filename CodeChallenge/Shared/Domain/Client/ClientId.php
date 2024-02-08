<?php

namespace CodeChallenge\Shared\Domain\Client;

use CodeChallenge\Shared\Domain\ValueObjects\IntValueObject;

class ClientId extends IntValueObject
{
    /**
     * @param int $clientId
     * @return ClientId
     */
    public static function create (int $clientId): ClientId
    {
        return new self($clientId);
    }
}
