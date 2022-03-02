<?php

namespace App\Http\Requests\Api\SuccessCompass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResultsRequest extends FormRequest
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
            'result' => 'required',
        ];
    }

}
