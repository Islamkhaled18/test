<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id','DESC') -> paginate(5);
        return view('dashboard.categories.index', compact('categories'));
    }//end of index

    public function create()
    {
        $categories = Category::select('id', 'parent_id', 'category_name')->get();
        return view('dashboard.categories.create', compact('categories'));
    }//end of create

    public function store(CategoryRequest $request)
    {

        if ($request->type == 1) {
            $request['parent_id'] = null;
        }
        $request_data = $request->except(['category_name_ar', 'category_name_en', 'slug_ar', 'slug_en', 'type']);

        $request_data['category_name']  = ['en' => $request->category_name_en,  'ar' => $request->category_name_ar];

        Category::create($request_data);

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('Categories.index');
    }//end of store

    public function edit($id)
    {

        $category = Category::orderBy('id', 'DESC')->findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }//end of edit

    public function update($id, CategoryRequest $request)
    {

        $category = Category::findOrFail($id);
        $category->update([
            'category_name'    => ['en' => $request->category_name_en, 'ar' => $request->category_name_ar],
        ]);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('Categories.index');
    }//end of update

    public function destroy($id)
    {
            //get specific categories and its translations
            $category = Category::orderBy('id', 'DESC')->findOrFail($id);
            $category->delete();

            return redirect()->route('Categories.index');

    }//end of destroy

}
