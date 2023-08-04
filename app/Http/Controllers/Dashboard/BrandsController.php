<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;

use App\Traits\BrandTrait;

use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\File;

class BrandsController extends Controller
{

    use BrandTrait;

    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('dashboard.brands.create');

    }

    public function store(BrandRequest $request)
    {


        try {
            DB::beginTransaction();

            if (!$request->has(['is_active']))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);


            $fileName = "";
            if ($request->has('photo')) {
                $fileName = uploadImage('brands', $request->photo);
            }

            $brands = Brand::create($request->except("_token", "photo"));

            $brands->name  = $request->name;
            $brands->photo = $fileName;
            $brands->save();
            DB::commit();
            return $this->getSuccessMessageCreate();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->getErrorMessageCreate();
        }


    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            $this->BrandNotFoundMessage();
        }

        else
            return view('dashboard.brands.edit', compact('brand'));
    }

    public function update(BrandRequest $request, $id)
    {
        try {
            //validation

            //update DB
            $brand = Brand::find($id);
            if (!$brand)
                return $this->BrandNotFoundMessage();

            DB::beginTransaction();
            $fileName = "";

            $oldImage = $brand->photo;

            if ($request->has('photo')) {
//                $image_path = public_path('assets/images/brands/' . $oldImage);
//                if (File::exists($image_path)) {
//                    File::delete($image_path);
//                }
                $fileName = uploadImage('brands', $request->photo);
                Brand::where('id', $id)
                    ->update
                    (['photo' => $fileName]);
            }

            if (!$request->has(['is_active']))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));

            //save translations
            $brand->name = $request->name;
            $brand->save();
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
            $brand->delete();
            return $this->getSuccessMessageDelete();

        } catch (\Exception $e) {
            return $this->getErrorMessageDelete();
        }


    }


}
