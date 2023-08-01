<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Traits\AdminGuardTrait;


class LogoutController extends Controller
{
    use AdminGuardTrait;

    public function logout(){
         $guard=$this->getAdmin();
         $guard->logout();

         return redirect()->route('admin.login');
    }
}
