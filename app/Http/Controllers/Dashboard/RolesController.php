<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Traits\RoleTrait;
use Illuminate\Http\Request;


class RolesController extends Controller
{
    use RoleTrait;
    public function index()
    {
        $roles=Role::get();
        return view('dashboard.roles.index',compact('roles'));
    }

     public function create()
     {
         return view('dashboard.roles.create');
     }

     public function saveRole(RoleRequest $request)
     {
         try {
             $role=$this->process(new Role,$request);
             if($role){
                  return $this->getSuccessMessageCreate();
             }else
             {
                 return $this->getErrorMessageCreate();
             }
         }catch (\Exception $e){
             return $this->getErrorMessageCreate();
         }
     }
     public function edit($id)
     {
         $role=Role::find($id);
         if(!$role)
         {
             return $this->RoleNotFoundMessage();
         }
         return view('dashboard.roles.edit',compact('role'));
     }

     public function update($id,RoleRequest $request)
     {
         try {
             $role=Role::findOrFail($id);
             if(!$role)
                 return $this->getErrorMessageUpdate();
             else
                 $role=$this->process($role,$request);
             return $this->getSuccessMessageUpdate();

         }catch (\Exception $e){
             return $this->getErrorMessageUpdate();
         }


     }

     protected function process(Role $role,Request $r)
     {
         $role->name=$r->name;
         $role->permissions=json_encode($r->permissions);
         $role->save();
         return $role;
     }

}
