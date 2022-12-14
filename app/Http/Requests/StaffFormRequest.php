<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffFormRequest extends FormRequest
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
       $rules = [
        'firstname' => [
            'required',
            'string',
            'max:50'
        ],
        'lastname' => [
            'required',
            'string',
            'max:50'
        ],
        'email' => [
            'required',
            'string',
        ],
        'role' => [
            'required',
            'string',
        ],
        'profile' => [
           'mimes:jpeg,png,jpg'
        ],
        'password' => [
            'required', 
            'string', 
            'min:8',
            'confirmed'
        ]
       ];

       return $rules;
    }
}
