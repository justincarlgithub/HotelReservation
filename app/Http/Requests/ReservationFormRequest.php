<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationFormRequest extends FormRequest
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
            'firstname'  => [
                'required',
            ],
            'lastname'  => [
                'required',
            ],
            'email'  => [
                'required',
            ],
            'adults'  => [
                'required',
            ],
            'kids'  => [
                'required',
            ],
            'check_in'  => [
                'required',
            ],
            'check_out'  => [
                'required',
            ],
            'contact'  => [
                'required',
            ]
            
           ];
           return $rules;
    }
}
