<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Traits\CategoryTrait;
use App\Traits\SubCategoryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SubCategoriesController extends Controller
{

   use SubCategoryTrait;

    public function index()
    {
        $categories = Category::child()->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.subcategories.index', compact('categories'));
    }

    public function create()
    {
       $categories=Category::parent()->orderBy('id','DESC')->get();
        return view('dashboard.subcategories.create',compact('categories'));
    }

    public function store(SubCategoryRequest $request)
    {


        try {
            DB::beginTransaction();

            if(!$request->has(['is_active']))
                $request->request->add(['is_active'=>0]);
            else
                $request->request->add(['is_active'=>1]);

             $category=Category::create($request->except("_token"));
            $category ->name=$request->name;
            $category->save();

            DB::commit();
            return $this->getSuccessMessageCreate();

        }catch (\Exception $e){
            DB::rollBack();
            return $this->getErrorMessageCreate();
        }

    }

    public function edit($id)
    {

        $category = Category::orderBy('id', 'DESC')->find($id);
        if (!$category) {
            $this->CategoryNotFoundMessage();
        }

        else
            $categories=Category::parent()->orderBy('id','DESC')->get();

            return view('dashboard.subcategories.edit', compact('category','categories'));
    }

    public function update(SubCategoryRequest $request, $id)
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
            $category=Category::find($id);
            if(!$category)
            {
                return $this->CategoryNotFoundMessage();
            }

            $category->delete();
            return $this->getSuccessMessageDelete();

        }catch (\Exception $e){
            return $this->getErrorMessageDelete();
        }


    }




}
