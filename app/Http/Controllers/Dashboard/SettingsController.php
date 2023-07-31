<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function editShippingMethod($type)
    {
        if ($type === 'free')
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        elseif ($type === 'inner')
            $shippingMethod = Setting::where('key', 'local_label')->first();
        elseif ($type === 'outer')
            $shippingMethod = Setting::where('key', 'outer_label')->first();
        else
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();


        return view('dashboard.settings.shippings.edit', compact('shippingMethod'));
    }


    public function updateShippingMethod(ShippingsRequest $request, $id)
    {
        //validate
        //
        try {
            $shippingMethod = Setting::find($id);
            DB::beginTransaction();
            //update transaction
            $shippingMethod->update(['plain_value' => $request->plain_value]);
            //save transaction
            $shippingMethod->value = $request->value;
            $shippingMethod->save();
            DB::commit();
            return redirect()->back()->with(['success' => __('messages.shippingMethod success')]);

        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('messages.shippingMethod error')]);
            DB::rollback();
        }
    }
}
