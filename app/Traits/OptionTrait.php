<?php

namespace App\Traits;

trait OptionTrait
{
    public function getSuccessMessageCreate()
    {
        return redirect()->route('admin.options')->with(['success' => __('messages.option add success')]);
    }

    public function getErrorMessageCreate()
    {
        return redirect()->route('admin.options')->with(['error' => __('messages.option add error')]);
    }
    public function getSuccessMessageUpdate()
    {
        return redirect()->route('admin.options')->with(['success' => __('messages.option update success')]);
    }

    public function getErrorMessageUpdate()
    {
        return redirect()->route('admin.options')->with(['error' => __('messages.option update error')]);
    }

    public function OptionNotFoundMessage()
    {
        return redirect()->route('admin.options')->with(['error' => __('Admin\options.option not found')]);;
    }

    public function getSuccessMessageDelete()
    {
        return redirect()->route('admin.options')->with(['success' => __('messages.option delete success')]);
    }

    public function getErrorMessageDelete()
    {
        return redirect()->route('admin.options')->with(['error' => __('messages.option delete error')]);
    }


}
