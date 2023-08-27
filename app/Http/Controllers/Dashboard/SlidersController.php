<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\ProductStockRequest;
use App\Http\Requests\SlidersRequest;
use App\Models\Image;
use App\Models\Slider;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Traits\ProductTrait;
use Illuminate\Support\Facades\DB;


class SlidersController extends Controller
{

    use ProductTrait;

    public function addSlider()
    {
        $images=Slider::get('photo');
        return view('dashboard.sliders.images.create',compact('images'));
    }

    //to save images to folder only
    public function saveProductSlider(\Illuminate\Http\Request $request)
    {

        $file     =$request->file('dzfile');
        $fileName =uploadImage('sliders', $file);

        return response()->json([
            'name' => $fileName,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function saveProductSlideDB(SlidersRequest $request)
    {
        try {

            if ($request->has('images') && count($request->images) > 0) {
                foreach ($request->images as $image) {
                    Slider::create([
                        'photo' => $image,
                    ]);
                }
            }

        } catch (\Exception $e) {
              return  $this->getErrorMessageUpdate();
        }
    }



}
