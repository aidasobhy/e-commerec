<?php

namespace App\Traits;

trait GuardTrait
{
    public function getGuard()
    {
        return auth('admin');
    }

}
