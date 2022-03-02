<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SteppedRegistrationRequest extends FormRequest
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
        $emailRule = 'sometimes|required|email|unique:users,email';
        $activationPackRule = 'sometimes|required|exists:activation_packs,id';
        $productRule = 'sometimes|exists:activation_packs,id';

        if (session('registration_step_0')['elite_challenge_participant'] == 1) {
            $emailRule = 'sometimes|required|email|exists:users,email';
            $activationPackRule = 'sometimes|exists:activation_packs,id';
            $productRule = 'sometimes|required|exists:products,id';
        }


        return [
            'email' => $emailRule,
            'password' => 'sometimes|required',
            'purl' => 'sometimes|required|exists:users,purl',
            'first_name' => 'sometimes|required|max:50',
            'last_name' => 'sometimes|required|max:50',
            'date_of_birth' => [
                "sometimes",
                "required",
                "date",
                "parseableDateInput"
            ],
            'mobile' => 'sometimes|required|max:50',
            'tin_ssn' => 'sometimes|required|max:50',
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
            'activation_pack_id' => $activationPackRule,
            'product_id' => $productRule,
            'auto_ship_id' => 'sometimes|required|exists:auto_ships,id',
            'ln_fee_id' => 'sometimes|required|exists:ln_fees,id',
            'monthly_fees' => 'sometimes|required',
            'bonuses' => 'sometimes|required',
            'taxes' => 'sometimes|required',
            'terms' => 'sometimes|required',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
