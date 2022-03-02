<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EliteChallengeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'sometimes|required|email|unique:users,email',
            'first_name' => 'sometimes|required|max:50',
            'purl' => 'sometimes|required|exists:users,purl',
            'last_name' => 'sometimes|required|max:50',
            'date_of_birth' => [
                "sometimes",
                "required",
                "date",
                "parseableDateInput"
            ],
            'mobile' => 'sometimes|required|max:50',
            'product_id' => 'sometimes|required|exists:products,id',
            'mailing_country' => 'sometimes|required|max:30',
            'mailing_address_1' => 'sometimes|required|max:100',
            'mailing_address_2' => 'sometimes|max:100',
            'mailing_city' => 'sometimes|required|max:50',
            'mailing_state' => 'sometimes|required|max:10',
            'mailing_postal_code' => 'sometimes|required|max:15',
            'physical_country' => 'sometimes|required|max:30',
            'physical_address_1' => 'sometimes|required|max:100',
            'physical_address_2' => 'sometimes|max:100',
            'physical_city' => 'sometimes|required|max:50',
            'physical_state' => 'sometimes|required|max:10',
            'physical_postal_code' => 'sometimes|required|max:15',
            'terms' => 'sometimes|required',
            'taxes' => 'sometimes|required',
        ];
    }
}
