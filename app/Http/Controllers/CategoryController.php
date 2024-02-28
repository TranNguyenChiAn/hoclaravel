<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Requests\StoreCustomerRequest;
use App\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


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

    public function create()
    {
        return view('admin.customer_manager.create');
    }

    public function addCategory()
    {
        return view('admin.category_manager.create');
    }

    public function storeCategory(Category $categories, Request $request)
    {
        $category = new Category();
        $category->name = $request->name;

        $categories->save();

        return view('admin.category_manager.index', [
            'categories' => $categories
        ]);
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

    public function destroy(Category $category, Product $product, Request $request)
    {
        $products = DB::table('products')
            ->select('id')
            ->get();

        if ($category->id != $products->id) {
            $category->delete();
            return Redirect::route('admin.category')->with('success', 'Delete a category successfully!');
        }
        else {
            return Redirect::route('admin.category')->with('success', 'Can not delete category. Because it relate with products!');
        }


    }

}
