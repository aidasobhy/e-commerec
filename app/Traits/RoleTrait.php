<?php

namespace App\Traits;

trait RoleTrait
{
    public function getSuccessMessageCreate()
    {
        return redirect()->route('admin.roles.index')->with(['success' => __('messages.role add success')]);
    }

    public function getErrorMessageCreate()
    {
        return redirect()->route('admin.roles.index')->with(['error' => __('messages.role add error')]);
    }
    public function getSuccessMessageUpdate()
    {
        return redirect()->route('admin.roles.index')->with(['success' => __('messages.role update success')]);
    }

    public function getErrorMessageUpdate()
    {
        return redirect()->route('admin.roles.index')->with(['error' => __('messages.role update error')]);
    }

    public function RoleNotFoundMessage()
    {
        return redirect()->route('admin.roles.index')->with(['error' => __('Admin\permissions.role not found')]);;
    }

    public function getSuccessMessageDelete()
    {
        return redirect()->route('admin.roles.index')->with(['success' => __('messages.role delete success')]);
    }

    public function getErrorMessageDelete()
    {
        return redirect()->route('admin.roles.index')->with(['error' => __('messages.role delete error')]);
    }


}
