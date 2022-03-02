<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class AdminEnrollmentRequest extends FormRequest
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
        return [
            'synergy_id' => 'required',
            'status' => 'required|in:ACTIVE',
        ];
    }

    public function messages()
    {
        return [
            'synergy_id.required' => 'Synergy ID is required',
            'status.required' => 'Status is required',
            'status.in' => 'Status must be ACTIVE',
        ];
    }
}
