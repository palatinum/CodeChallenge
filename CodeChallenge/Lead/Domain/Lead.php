<?php

namespace CodeChallenge\Lead\Domain;

use CodeChallenge\Lead\Domain\ValueObject\Email;
use CodeChallenge\Lead\Domain\ValueObject\LeadId;
use CodeChallenge\Lead\Domain\ValueObject\Name;
use CodeChallenge\Lead\Domain\ValueObject\Phone;
use CodeChallenge\Lead\Domain\ValueObject\Score;

class Lead
{
    /**
     * @var LeadId
     */
    private LeadId $id;
    /**
     * @var Name
     */
    private Name $name;
    /**
     * @var Email
     */
    private Email $email;
    /**
     * @var Phone
     */
    private Phone $phone;

    /**
     * @var Score
     */
    private Score $score;

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
     * @return Lead
     */
    public static function create (
        Name $name,
        Email $email,
        Phone $phone,
    ): Lead
    {
        return new self($name, $email, $phone);
    }

    /**
     * @return LeadId
     */
    public function getId(): LeadId
    {
        return $this->id;
    }

    /**
     * @param LeadId $id
     */
    public function setId(LeadId $id): void
    {
        $this->id = $id;
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
     * @return Score
     */
    public function getScore(): Score
    {
        return $this->score;
    }

    /**
     * @param Score $score
     * @return void
     */
    public function setScore(Score $score): void
    {
        $this->score = $score;
    }

    /**
     * @return array
     */
    public function serializetoArray(): array
    {
        return [
            'id' => $this->id->value(),
            'name' => $this->name->value(),
            'email' => $this->email->value(),
            'phone' => $this->phone->value(),
            'score' => $this->score->value(),
        ];
    }
}
