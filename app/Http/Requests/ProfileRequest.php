<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:admins,email,'.$this->id,
            'password'=>'nullable|confirmed|min:6',
        ];
    }



    public function messages()
    {
        return [
            'name.required'=>__('messages.admin name required'),
            'email.required'=>__('messages.admin email required'),
            'email.email'=>__('messages.admin email must be email format'),
            'email.unique'=>__('messages.admin email must be unique'),
            'password.confirmed'=>__('messages.admin password confirm'),
            'password.min'=>__('messages.admin password min')

        ];
    }
}
