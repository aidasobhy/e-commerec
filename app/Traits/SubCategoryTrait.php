<?php

namespace App\Traits;

trait SubCategoryTrait
{
    public function getSuccessMessageCreate()
    {
        return redirect()->route('admin.subCategories')->with(['success' => __('messages.cat add success')]);
    }

    public function getErrorMessageCreate()
    {
        return redirect()->route('admin.subCategories')->with(['error' => __('messages.cat add error')]);
    }
    public function getSuccessMessageUpdate()
    {
        return redirect()->route('admin.subCategories')->with(['success' => __('messages.cat update success')]);
    }

    public function getErrorMessageUpdate()
    {
        return redirect()->route('admin.subCategories')->with(['error' => __('messages.cat update error')]);
    }

    public function CategoryNotFoundMessage()
    {
        return redirect()->route('admin.subCategories')->with(['error' => __('Admin\categories.cat not found')]);;
    }

    public function getSuccessMessageDelete()
    {
        return redirect()->route('admin.subCategories')->with(['success' => __('messages.cat delete success')]);
    }

    public function getErrorMessageDelete()
    {
        return redirect()->route('admin.subCategories')->with(['error' => __('messages.cat delete error')]);
    }


}
