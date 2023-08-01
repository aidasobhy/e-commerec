<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use App\Traits\AdminGuardTrait;


class ProfileController extends Controller
{
    use AdminGuardTrait;

    public function editProfile()
    {
        $id    = $this->getAdmin()->user()->id;
        $admin = Admin::find($id);

        return view('dashboard.profile.edit', compact('admin'));
    }


    public function updateProfile(ProfileRequest $request)
    {

         $id=$this->getAdmin()->user()->id;
         $admin=Admin::find($id);

        if ($request->filled('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        unset($request['id']);
        unset($request['password_confirmation']);

        $admin->update($request->all());
        try {
        $admin->update($request->only(['name','email']));
            return redirect()->back()->with(['success' => __('messages.profile success')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('messages.profile error')]);
        }
    }
}
