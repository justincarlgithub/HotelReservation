<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomFormRequest extends FormRequest
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
        if($this->getMethod()== "POST") 
        {
            $rules = [
                'profile' => [
                    'required',
                    'mimes:jpeg,png,jpg'
                ],
                'name' => [
                    'required',
                    'string',
                    'max:200' 
                ],
                'price' => [
                    'required' 
                ],
                'capacity' => [
                    'required' 
                ],
                'description' => [
                    'required'
                ],
                'RoomNo' => [
                    'required', 
                    'unique:room',
                ],
               ];
        }

        if($this->getMethod()== "PUT") 
        {
            $rules = [
                'profile' => [
                    'required',
                    'mimes:jpeg,png,jpg'
                ],
                'name' => [
                    'required',
                    'string',
                    'max:200' 
                ],
                'price' => [
                    'required' ,
                    'integer',
                ],
                'capacity' => [
                    'required' ,
                    'numeric'
                ],
                'description' => [
                    'required'
                ],
                'RoomNo' => [
                    'required', 
                    'unique:room',
                ],
               ];
        }
        
      
       return $rules;
    }
}
