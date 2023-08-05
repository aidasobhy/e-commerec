<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\TagRequest;
use App\Models\Brand;

use App\Models\Tag;
use App\Traits\BrandTrait;

use App\Traits\TagTrait;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use Illuminate\Support\Facades\File;

class TagsController extends Controller
{

    use TagTrait;



    public function index()
    {
        $tags = Tag::paginate(PAGINATION_COUNT);
        return view('dashboard.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('dashboard.tags.create');

    }

    public function store(TagRequest $request)
    {

        try {
            DB::beginTransaction();
            $tag = Tag::create(['slug' => $request->slug]);

            //save translations
            $tag->name = $request->name;
            $tag->save();
            DB::commit();
            return $this->getSuccessMessageCreate();
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->getErrorMessageCreate();
        }


    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        if (!$tag) {
            $this->TagNotFoundMessage();
        }

        else
            return view('dashboard.tags.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id)
    {
        try {
            //validation

            //update DB
            $tag = Tag::find($id);

            if (!$tag)
                return $this->TagNotFoundMessage();

            DB::beginTransaction();

            $tag->update($request->except('_token', 'id'));//update only for slug
            //save translations
            $tag->name = $request->name;
            $tag->save();

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
            $tag = Tag::find($id);
            if (!$tag) {
                return $this->TagNotFoundMessage();
            }


            //delete translations
             $tag->translations()->delete();

            $tag->delete();
            return $this->getSuccessMessageDelete();

        } catch (\Exception $e) {
            return $this->getErrorMessageDelete();
        }


    }


}
