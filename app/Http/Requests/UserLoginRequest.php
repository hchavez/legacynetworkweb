<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
//            'email' => 'required'
            'email' => 'required|active_user'
        ];
    }

    public function messages()
    {
        return [
            'email.active_user' => 'Account does not exist or is waiting activation.',
        ];
    }
}
