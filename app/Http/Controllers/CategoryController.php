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
        $categories = DB::table('categories')
            ->select('*')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin.category_manager.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin.customer_manager.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        if ($request->validated()) {
            $array = [];
            $array = Arr::add($array, 'first_name', $request->first_name);
            $array = Arr::add($array, 'last_name', $request->last_name);
            $array = Arr::add($array, 'email', $request->email);
            $array = Arr::add($array, 'password', Hash::make($request->password));
            $array = Arr::add($array, 'phone_number', $request->phone_number);
            $array = Arr::add($array, 'address', $request->address);
            $array = Arr::add($array, 'status', $request->status);
            //Lấy dữ liệu từ form và lưu lên db
            Customer::create($array);

            return Redirect::route('admin/customer')->with('success', 'Add a customer successfully!');
        }
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

    public function destroy(Category $category)
    {
        $category->delete();
        return Redirect::route('admin.category')->with('success', 'Delete a category successfully!');
    }

}
