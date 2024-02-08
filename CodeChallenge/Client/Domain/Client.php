<?php

namespace CodeChallenge\Client\Domain;

use CodeChallenge\Shared\Domain\Client\ClientId;
use CodeChallenge\Client\Domain\ValueObject\Name;
use CodeChallenge\Client\Domain\ValueObject\Phone;
use CodeChallenge\Shared\Domain\ValueObjects\Email;

class Client
{
    /**
     * @var ClientId
     */
    protected ClientId $clientId;
    /**
     * @var Name
     */
    protected Name $name;
    /**
     * @var Email
     */
    protected Email $email;
    /**
     * @var Phone
     */
    protected Phone $phone;

    /**
     * @param Name $name
     * @param Email $email
     * @param Phone $phone
     */
    public function __construct(Name $name, Email $email, Phone $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @param Name $name
     * @param Email $email
     * @param Phone $phone
     * @return Client
     */
    public static function create (
        Name $name,
        Email $email,
        Phone $phone,
    ): Client
    {
        return new self($name, $email, $phone);
    }

    /**
     * @return ClientId
     */
    public function getClientId(): ClientId
    {
        return $this->clientId;
    }

    /**
     * @param ClientId $clientId
     */
    public function setClientId(ClientId $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @param Name $name
     */
    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
    }

    /**
     * @param Phone $phone
     */
    public function setPhone(Phone $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return array
     */
    public function serializeArray(): array
    {
        return [
            'id' => $this->clientId->value(),
            'name' => $this->name->value(),
            'email' => $this->email->value(),
            'phone' => $this->phone->value(),
        ];
    }
}
