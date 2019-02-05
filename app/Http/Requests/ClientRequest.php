<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
     /* Determine if the user is authorized to make this request.
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
        $rules =  [
            'fname' =>  'required', 
            'lname' => 'required', 
            'email' => 'required', 
            'contact' => 'required',
            'gender' => 'required',
            'street' => 'required',
            'barangay' => 'required',
            'town' => 'nullable',
            'province' => 'required', 
            'city' => 'required',
            'postal_code' => 'required',
            'username' => 'sometimes|required'
        ];

        return $rules;
    }
}