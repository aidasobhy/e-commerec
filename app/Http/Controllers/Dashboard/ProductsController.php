<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImagesRequest;
use App\Http\Requests\ProductStockRequest;
use App\Models\Image;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Traits\ProductTrait;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{

    use ProductTrait;


    public function index()
    {
        $products = Product::select('id', 'slug', 'price', 'created_at', 'is_active')->get();
        return view('dashboard.products.general.index', compact('products'));
    }

    public function create()
    {
        $data               = [];
        $data['brands']     = Brand::active()->select('id')->get();
        $data['tags']       = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
        return view('dashboard.products.general.create', $data);

    }

    public function store(ProductRequest $request)
    {

        try {
            DB::beginTransaction();

            //validation
            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //save to database
            $product = Product::create(
                [
                    'slug' => $request->slug,
                    'brand_id' => $request->brand_id,
                    'is_active' => $request->is_active
                ]
            );

            //save translations
            $product->name              = $request->name;
            $product->description       = $request->description;
            $product->short_description = $request->short_description;
            $product->save();
            //save categories
            $product->categories()->attach($request->categories);
            //save tags
            $product->tags()->attach($request->tags);


            DB::commit();
            return $this->getSuccessMessageCreate();

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->getErrorMessageDelete();

        }


    }

    public function getPrice($product_id)
    {
        return view('dashboard.products.prices.create')->with('id', $product_id);
    }

    public function saveProductPrice(\Illuminate\Http\Request $request)
    {
        try {
            Product::whereId($request->product_id)
                ->update($request->except(['_token', 'product_id']));
            return $this->getSuccessMessageUpdate();

        } catch (\Exception $e) {
            return $this->getErrorMessageUpdate();
        }
    }

    public function getStock($product_id)
    {
        return view('dashboard.products.stock.create')->with('id', $product_id);
    }

    public function saveProductStock(ProductStockRequest $request)
    {
        try {
            Product::whereId($request->product_id)
                ->update($request->except(['_token', 'product_id']));
            return $this->getSuccessMessageUpdate();

        } catch (\Exception $e) {
            return $this->getErrorMessageUpdate();
        }
    }

    public function addImages($product_id)
    {
        return view('dashboard.products.images.create')->with('id', $product_id);
    }

    //to save images to folder only
    public function saveProductImages(\Illuminate\Http\Request $request)

    {
        $file     = $request->file('dzfile');
        $fileName = uploadImage('products', $file);

        return response()->json([
            'name' => $fileName,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function saveProductImagesDB(ProductImagesRequest $request)
    {
        try {

            if ($request->has('documents') && count($request->documents) > 0) {
                foreach ($request->documents as $image) {
                    Image::create([
                        'product_id' => $request->product_id,
                        'photo' => $image,
                    ]);
                }
            }
            return $this->getSuccessMessageUpdate();
        } catch (\Exception $e) {
              return  $this->getErrorMessageUpdate();
        }
    }

    public function edit($id)
    {
        $category = Category::orderBy('id', 'DESC')->find($id);
        if (!$category) {
            $this->CategoryNotFoundMessage();
        }
        else
            $categories = Category::select('id', 'parent_id')->get();
        return view('dashboard.categories.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, $id)
    {

        try {
            //validation

            //update DB
            $category = Category::find($id);
            if (!$category)
                return $this->CategoryNotFoundMessage();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category->update($request->all());

            //save translations
            $category->name = $request->name;
            $category->save();

            return $this->getSuccessMessageUpdate();
        } catch (\Exception $ex) {

            return $this->getErrorMessageUpdate();
        }

    }

    public function delete($id)
    {

        try {
            $category = Category::find($id);
            if (!$category) {
                return $this->CategoryNotFoundMessage();
            }

            $category->translations()->delete();

            $category->delete();
            return $this->getSuccessMessageDelete();

        } catch (\Exception $e) {
            return $this->getErrorMessageDelete();
        }


    }


}
