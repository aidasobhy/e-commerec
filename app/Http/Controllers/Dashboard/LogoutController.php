<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\GuardTrait;


class LogoutController extends Controller
{
    use GuardTrait;

    public function logout(){
         $guard=$this->getGuard();
         $guard->logout();

         return redirect()->route('admin.login');
    }
}
