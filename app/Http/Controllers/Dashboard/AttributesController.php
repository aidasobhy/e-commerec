<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\BrandRequest;
use App\Models\Attribute;
use App\Models\Brand;

use App\Traits\AttributeTrait;
use App\Traits\BrandTrait;

use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\File;

class AttributesController extends Controller
{

   use AttributeTrait;

    public function index()
    {
        $attributes= Attribute::orderBy('id', 'DESC')->get();
        return view('dashboard.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('dashboard.attributes.create');

    }

    public function store(AttributeRequest $request)
    {
        try {

            $attribute= Attribute::create([]);
              $attribute->name=$request->name;
              $attribute->save();
            return $this->getSuccessMessageCreate();

        } catch (\Exception $e) {
            return $this->getErrorMessageCreate();
        }


    }

    public function edit($id)
    {
        $attribute = Attribute::find($id);
        if (!$attribute) {
           return $this->AttributeNotFoundMessage();
        }

        else
            return view('dashboard.attributes.edit', compact('attribute'));
    }

    public function update($id,AttributeRequest $request)
    {
        try {
            //validation

            //update DB

            $attribute = Attribute::find($id);
            if(!$attribute)
            {
                return  $this->AttributeNotFoundMessage();
            }
            DB::beginTransaction();



            $attribute->name=$request->name;
            $attribute->save();


            DB::commit();
            return $this->getSuccessMessageUpdate();

        } catch (\Exception $ex) {
            DB::rollBack();
            return $this->getErrorMessageUpdate();
        }

    }

    public function delete($id)
    {

        try {
            $brand = Brand::find($id);
            if (!$brand) {
                return $this->BrandNotFoundMessage();
            }

//            $oldImage   = $brand->photo;
//            $image_path = public_path('assets/images/brands/' . $oldImage);
//            if (File::exists($image_path)) {
//                File::delete($image_path);
//            }

            $brand->translations()->delete();
            $brand->delete();
            return $this->getSuccessMessageDelete();

        } catch (\Exception $e) {
            return $this->getErrorMessageDelete();
        }


    }


}
