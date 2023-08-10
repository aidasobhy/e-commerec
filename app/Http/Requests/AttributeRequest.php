<?php

namespace App\Http\Requests;

use App\Rules\AttributName;
use App\Rules\UniqueAttributeName;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
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
                 'name'=>'required|max:100|unique:attribute_translations,name,'.$this->id
//               'name'=>['required','max:100',new UniqueAttributeName($this->name,$this->id)]
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>__('Admin/attributes.name required'),
            'name.unique'=>__('Admin/attributes.name unique'),

        ];
    }


}
