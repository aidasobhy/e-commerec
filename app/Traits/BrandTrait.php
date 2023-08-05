<?php

namespace App\Traits;

trait BrandTrait
{
    public function getSuccessMessageCreate()
    {
        return redirect()->route('admin.brands')->with(['success' => __('messages.brand add success')]);
    }

    public function getErrorMessageCreate()
    {
        return redirect()->route('admin.brands')->with(['error' => __('messages.brand add error')]);
    }
    public function getSuccessMessageUpdate()
    {
        return redirect()->route('admin.brands')->with(['success' => __('messages.brand update success')]);
    }

    public function getErrorMessageUpdate()
    {
        return redirect()->route('admin.brands')->with(['error' => __('messages.brand update error')]);
    }

    public function BrandNotFoundMessage()
    {
        return redirect()->route('admin.brands')->with(['error' => __('Admin\brands.brand not found')]);;
    }

    public function getSuccessMessageDelete()
    {
        return redirect()->route('admin.brands')->with(['success' => __('messages.brand delete success')]);
    }

    public function getErrorMessageDelete()
    {
        return redirect()->route('admin.brands')->with(['error' => __('messages.brand delete error')]);
    }


}
