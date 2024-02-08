<?php

namespace CodeChallenge\Shared\Domain\FormData;

// class example to generate forms to use in the forntend

class FormData
{
    /**
     * @return FormData
     */
    public static function create (): FormData
    {
        return new self();
    }

    /**
     * @return array
     */
    public function serializeArray(): array
    {
        return [
            [
                'id' => "name",
                'label' => "Full name",
                'placeholder' => "Enter full name",
                'type' => "text",
                'validationType' => "string",
                'value' => "",
                'validations' => [],
            ]
        ];
    }
}
