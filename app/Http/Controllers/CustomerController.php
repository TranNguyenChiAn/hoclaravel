<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Product;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customer_manager.index', [
            'customers' => $customers,
        ]);
    }

    public function showProduct()
    {
        $categories = Category::all();
        $ages = Age::all();

        $products = Product::with('age')
            ->with('category')
            ->paginate(8);

        return view('customer.pages.index', [
            'products' => $products,
            'ages' => $ages,
            'categories' => $categories
        ]);
    }

    public function editProfile(){

    }

    public function updateProfile(){

    }


    public function showOrderHistory(){

    }

    public function editPassword(){

    }

    public function updatePassword(){

    }

}
