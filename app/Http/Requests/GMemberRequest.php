<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GMemberRequest extends FormRequest
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
        return [
            'address'=> 'required',
            'email'=>'required|email',
            'phone'=>'max:11|starts_with:01',
            'password'=>'required',
            'conPassword'=>'same:password'
        ];
    }

    public function messages(){

        return [

            'conPassword.same'=> "Confirm Password must be same as Password"

        ];

    }
}
