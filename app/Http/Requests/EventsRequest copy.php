<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class EventsRequest extends FormRequest
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
                'user_id' => 'required',
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'max_participants' => 'required|numeric'
            ];
        } elseif ($method == 'PUT') {
            return [
                'name' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'max_participants' => 'required|numeric'
            ];
        }
    }
}
