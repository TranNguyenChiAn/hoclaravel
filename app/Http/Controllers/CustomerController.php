<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
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

    public function productDetail(int $id)
    {
        $product = Product::with('age')
            ->with('category')
            ->where('id', $id)
            ->first();

        return view('customer.pages.product_detail', [
            'product' => $product
        ]);
    }

    public function login(){
        return view('customer.account.login');
    }

    public function loginProcess(Request $request)
    {
        $account = $request->only(['email', 'password']);
        $check = Auth::guard('customer')->attempt($account);

        if ($check) {
            //Lấy thông tin của customer đang login
            $customer = Auth::guard('customer')->user();
            //Cho login
            Auth::guard('customer')->login($customer);
            //Ném thông tin customer đăng nhập lên session
            session(['customer' => $customer]);
            return Redirect::route('profile');
        } else {
            //cho quay về trang login
            return Redirect::back();
        }
    }

    public function profile(){
        //id cua customer dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        return view('customer.profile.index', [
            'customer' => $customer
        ]);

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
