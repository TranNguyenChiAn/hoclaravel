<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Requests\StoreCategoryRequest;
use App\Requests\StoreCustomerRequest;
use App\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    //trang index
    public function show()
    {
//        $categories = DB::table('categories')
//            ->select('*')
//            ->orderBy('id', 'asc')
//            ->get();


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

    public function editCategory(Category $categories, Request $request)
    {
        return view('admin.category_manager.edit', [
            'categories' => $categories
        ]);
    }

    public function updateCategory(Category $categories, Request $request)
    {
        $category = new Category();
        $category->name = $request->name;

        $categories->save();

        return view('admin.category_manager.index', [
            'categories' => $categories
        ]);
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
