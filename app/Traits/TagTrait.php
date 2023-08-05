<?php

namespace App\Traits;

trait TagTrait
{
    public function getSuccessMessageCreate()
    {
        return redirect()->route('admin.tags')->with(['success' => __('messages.tag add success')]);
    }

    public function getErrorMessageCreate()
    {
        return redirect()->route('admin.tags')->with(['error' => __('messages.tag add error')]);
    }
    public function getSuccessMessageUpdate()
    {
        return redirect()->route('admin.tags')->with(['success' => __('messages.tag update success')]);
    }

    public function getErrorMessageUpdate()
    {
        return redirect()->route('admin.tags')->with(['error' => __('messages.tag update error')]);
    }

    public function TagNotFoundMessage()
    {
        return redirect()->route('admin.tags')->with(['error' => __('Admin\tags.tag not found')]);;
    }

    public function getSuccessMessageDelete()
    {
        return redirect()->route('admin.tags')->with(['success' => __('messages.tag delete success')]);
    }

    public function getErrorMessageDelete()
    {
        return redirect()->route('admin.tags')->with(['error' => __('messages.tag delete error')]);
    }


}
