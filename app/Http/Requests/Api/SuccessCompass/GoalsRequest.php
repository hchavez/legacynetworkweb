<?php

namespace App\Http\Requests\Api\SuccessCompass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GoalsRequest extends FormRequest
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
        if ($this->method() == 'GET') {
            return [
                'type' => 'required|in:health,business',
            ];
        }

        return [
            'type' => 'required|in:health,business',
            'goal' => 'required|max:255',
            'due_date' => 'required|date',
            'purpose' => 'array|min:0|max:4',
        ];
    }

    public function messages()
    {
        return [
            'type.in' => 'type value must be "health" or "business"',
        ];
    }

}
