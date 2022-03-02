<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SupportTicketRequest extends FormRequest
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
            'subject' => 'sometimes|required',
            'description' => 'sometimes|required',
            'category_id' => 'sometimes|required',
            'closed_date' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
//            'email.active_user' => 'Account is awaiting activation.',
        ];
    }
}
