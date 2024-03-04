<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    //trang index
    public function show()
    {
        //Lấy dữ liệu từ bảng
        $categories = Category::get()->sortBy('id')->all();

        //Trả lại view
        return view('admin.category_manager.index', [
            'categories' => $categories
        ]);
    }

    public function addCategory()
    {
        $categories = Category::all();
        return view('admin.category_manager.create', [
            'categories' => $categories
        ]);
    }

    public function storeCategory(Request  $request)
    {
            $array = [];
            $array = Arr::add($array, 'name', $request->name);
            //Lấy dữ liệu từ form và lưu lên db
            Category::create($array);
            return Redirect::route('admin.category');
    }

    public function editCategory(Category $category, Request $request)
    {
        //Gọi đến view để sửa
        return view('admin.category_manager.edit', [
            'category' => $category
        ]);
    }

    public function updateCategory(UpdateCategoryRequest $request, Category $category)
    {
        $array = [];
        $array = Arr::add($array, 'name', $request->name);

        $category->update($array);

        return Redirect::route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */

    public function destroy(Category $category)
    {
        $category->delete();
        return Redirect::route('admin.category')->with('success', 'Delete a category successfully!');

    }

}
