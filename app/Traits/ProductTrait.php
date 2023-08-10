<?php

namespace App\Traits;

trait ProductTrait
{
    public function getSuccessMessageCreate()
    {
        return redirect()->route('admin.products')->with(['success' => __('messages.product add success')]);
    }

    public function getErrorMessageCreate()
    {
        return redirect()->route('admin.products')->with(['error' => __('messages.product add error')]);
    }
    public function getSuccessMessageUpdate()
    {
        return redirect()->route('admin.products')->with(['success' => __('messages.product update success')]);
    }

    public function getErrorMessageUpdate()
    {
        return redirect()->route('admin.products')->with(['error' => __('messages.product update error')]);
    }

    public function BrandNotFoundMessage()
    {
        return redirect()->route('admin.products')->with(['error' => __('Admin\products.product not found')]);;
    }

    public function getSuccessMessageDelete()
    {
        return redirect()->route('admin.products')->with(['success' => __('messages.product delete success')]);
    }

    public function getErrorMessageDelete()
    {
        return redirect()->route('admin.products')->with(['error' => __('messages.product delete error')]);
    }


}
