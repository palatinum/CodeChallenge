<?php

namespace App\Http\Requests;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class CreateLeadRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|integer|exists:clients,id',
            'email' => 'required|email|max:255',
            'mortgage_request_amount' => 'required|integer',
            'purpose_mortgage' => [
                'required',
                Rule::in(['primera-vivienda', 'segunda-vivienda'])
            ],
        ];
    }

    /**
     * @param Validator $validator
     * @return mixed
     */
    protected function failedValidation(Validator $validator): mixed
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
