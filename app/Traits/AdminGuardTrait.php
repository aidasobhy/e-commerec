<?php

namespace App\Traits;

trait AdminGuardTrait
{
    public function getAdmin()
    {
        return auth('admin');
    }
}
