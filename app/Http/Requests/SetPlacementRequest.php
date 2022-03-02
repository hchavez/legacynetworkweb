<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SetPlacementRequest extends FormRequest
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
            'placement' => 'required|in:R,L',
            'user_id' => 'required|exists:users,id',

        ];
    }

    public function messages()
    {
        return [
            'placement.in' => 'Accepted placement values are R and L'
        ];
    }
}
