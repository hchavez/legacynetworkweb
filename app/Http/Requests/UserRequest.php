<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $method = $this->getMethod();

        if ($method == 'POST') {
            return [
                'first_name' => 'sometimes|required',
                'last_name' => 'sometimes|required',
                'email' => 'sometimes|required|unique:users|email',
                'purl' => 'sometimes|required|unique:users',
                'password' => 'sometimes|required|confirmed|min:6',
                'date_of_birth' => 'sometimes|required',
            ];
        } elseif ($method == 'PUT') {
            return [
                'first_name' => 'sometimes|required',
                'last_name' => 'sometimes|required',
                'date_of_birth' => 'sometimes|required',
                'purl' => 'sometimes|required',
            ];
        }

    }
}
