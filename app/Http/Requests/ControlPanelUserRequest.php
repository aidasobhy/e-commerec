<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ControlPanelUserRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed',
            'role_id'=>'required|exists:roles,id'
        ];
    }

    public function messages()
    {
       return [
           'name.required'=>__('Admin\users.name required'),
           'email.required'=>__('Admin\users.email required'),
           'email.email'=>__('Admin\users.email format'),
           'password.required'=>__('Admin\users.password required'),
           'password.confirmed'=>__('Admin\users.password confirm'),
           'role_id.required'=>__('Admin\users.role required'),
       ];
    }
}
