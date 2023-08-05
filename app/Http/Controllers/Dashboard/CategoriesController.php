<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Traits\CategoryTrait;
use Illuminate\Support\Facades\DB;


class CategoriesController extends Controller
{

    use CategoryTrait;

    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::select('id', 'parent_id')->get();
        return view('dashboard.categories.create', compact('categories'));

    }

    public function store(CategoryRequest $request)
    {


        try {
            DB::beginTransaction();



            if (!$request->has(['is_active']))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            //   f user choose main category
            if ($request->type == 1) {
                $request->request->add(['parent_id' => null]);
            }

            $category       = Category::create($request->except("_token"));
            $category->name = $request->name;
            $category->save();

            DB::commit();
            return $this->getSuccessMessageCreate();

        } catch (\Exception $e) {
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
            $categories = Category::select('id', 'parent_id')->get();
            return view('dashboard.categories.edit', compact('category','categories'));
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
