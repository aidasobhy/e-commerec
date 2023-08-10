<?php

namespace App\Rules;

use App\Models\AttributeTranslation;
use Illuminate\Contracts\Validation\Rule;

class UniqueAttributeName implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $_attributeName;
    private $_attributeId;

    public function __construct($attributeName, $attributeId)

    {
        $this->_attributeName = $attributeName;
        $this->_attributeId   = $attributeId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->_attributeId) //edit form
            $attribute = AttributeTranslation::where('name', $value)->
            where('attribute_id','!=',$this->_attributeId)->first();
        else //creation form
            $attribute = AttributeTranslation::where('name', $value)->first();
        if ($attribute)
            return false;
        else
            return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Admin/attributes.name unique');
    }
}
