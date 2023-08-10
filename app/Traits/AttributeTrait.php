<?php

namespace App\Traits;

trait AttributeTrait
{
    public function getSuccessMessageCreate()
    {
        return redirect()->route('admin.attributes')->with(['success' => __('messages.attribute add success')]);
    }

    public function getErrorMessageCreate()
    {
        return redirect()->route('admin.attributes')->with(['error' => __('messages.attribute add error')]);
    }
    public function getSuccessMessageUpdate()
    {
        return redirect()->route('admin.attributes')->with(['success' => __('messages.attribute update success')]);
    }

    public function getErrorMessageUpdate()
    {
        return redirect()->route('admin.attributes')->with(['error' => __('messages.attribute update error')]);
    }

    public function AttributeNotFoundMessage()
    {
        return redirect()->route('admin.attributes')->with(['error' => __('Admin\attributes.attribute not found')]);;
    }

    public function getSuccessMessageDelete()
    {
        return redirect()->route('admin.attributes')->with(['success' => __('messages.attribute delete success')]);
    }

    public function getErrorMessageDelete()
    {
        return redirect()->route('admin.attributes')->with(['error' => __('messages.attribute delete error')]);
    }


}
