<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProductQty implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */

    private $_manage_stock;

    public function __construct($manage_stock)
    {
        $this->_manage_stock = $manage_stock;
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
        if ($this->_manage_stock == 1 && $value == null)
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
        return __('Admin/products.qty required');
    }
}
