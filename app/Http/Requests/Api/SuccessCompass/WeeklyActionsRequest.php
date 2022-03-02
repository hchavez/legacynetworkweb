<?php

namespace App\Http\Requests\Api\SuccessCompass;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class WeeklyActionsRequest extends FormRequest
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
            'week' => 'required|max:255',
            'weekly_items' => 'array',
            'weekly_items.*.title' => 'required|string',
            'weekly_items.*.days' => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'type.in' => 'type value must be "health" or "business"',
        ];
    }

}
