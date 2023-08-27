<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlPanelUserRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
//        $users=Admin::where('id','<>',auth()->id())->get();
        $users=Admin::get();

        return view('dashboard.users.index',compact('users'));
    }

    public function create()
    {
        $roles=Role::get();
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(ControlPanelUserRequest $request)
    {
       $user=New Admin();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->role_id=$request->role_id;

        if($user->save()){
            return redirect()->route('admin.users.index')->with(['success'=>__('messages.user add success')]);
        }else
        {
            return redirect()->route('admin.users.index')->with(['error'=>__('messages.user add error')]);

        }
    }
}
