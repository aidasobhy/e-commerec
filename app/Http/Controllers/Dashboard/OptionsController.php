<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionRequest;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\ProductStockRequest;
use App\Models\Attribute;
use App\Models\Image;
use App\Models\Option;
use App\Traits\OptionTrait;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Traits\ProductTrait;
use Illuminate\Support\Facades\DB;


class OptionsController extends Controller
{

    use OptionTrait;


    public function index()
    {
        $options = Option::with(['product' => function ($product) {
            $product->select('id');
        },
            'attribute' => function ($attribute) {
                $attribute->select('id');
            }
        ])
            ->select('id', 'product_id', 'attribute_id', 'price')->get();
        return view('dashboard.options.index', compact('options'));
    }

    public function create()
    {
        $data               = [];
        $data['products']   = Product::active()->select('id')->get();
        $data['attributes'] = Attribute::select('id')->get();

        return view('dashboard.options.create', $data);

    }

    public function store(OptionRequest $request)
    {

        try {
            $option = Option::create([
                'attribute_id' => $request->attribute_id,
                'product_id' => $request->product_id,
                'price' => $request->price
            ]);

            //save translation
            $option->name = $request->name;
            $option->save();
            return $this->getSuccessMessageCreate();

        } catch (\Exception $e) {
            return $this->getErrorMessageCreate();
        }


    }


    public function edit($optionId)
    {
        $data           = [];
        $data['option'] = Option::find($optionId);
        if (!$data['option'])
            return $this->OptionNotFoundMessage();
        else
            $data['products'] = Product::active()->select('id')->get();
            $data['attributes']   = Attribute::select('id')->get();

            return view('dashboard.options.edit',$data);
    }

    public function update(OptionRequest $request, $id)
    {

        try {
            //validation

            //update DB
            $option= Option::find($id);
            if (!$option)
                return $this->OptionNotFoundMessage();

            $option->update($request->only(['price','product_id','attribute_id']));

            //save translations
            $option->name = $request->name;
            $option->save();

            return $this->getSuccessMessageUpdate();
        } catch (\Exception $ex) {

            return $this->getErrorMessageUpdate();
        }

    }



}
