<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Age;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'password'=> 'required'
        ], [
            'email.required'=>'Email can not be empty',
            'password.required'=>'Password can not be empty',
        ]);

        if($validator->fails()){
            return redirect()->route('customer.login')->withErrors($validator)->withInput();
        }

        $loginInfor = ['email' => $request->email, 'password' => $request->password];

        if(Auth::guard('customer')->attempt($loginInfor)){

            //Lấy thông tin của customer đang login
            $customer = Auth::guard('customer')->user();
            //Cho login
            Auth::guard('customer')->login($customer);
            //Ném thông tin customer đăng nhập lên session
            session(['customer' => $customer]);
//            $request->session()->regenerate();
            return redirect()->route('index');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function register (){
        return view('customer.account.register');
    }

    public function registerProcess (Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email'=>'required|unique:customers',
            'phone'=>'required|unique:customers',
            'address'=>'required|max:255',
            'password'=> 'required'
            ], [
            'name.required' => 'Name can not be empty',
            'email.required'=>'Email can not be empty',
            'phone.required'=>'Phone can not be empty',
            'address.required'=>'Address can not be empty',
            'password.required'=>'Password can not be empty',
            'email.unique'=>'Email has been exist',
            'phone.unique'=>'Phone has been exist',
        ]);

        if($validator->fails()){
            return redirect()->route('customer.register')->withErrors($validator)->withInput();
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone= $request->phone;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->setPasswordAttributes($request->password);
        $customer->save();

        return redirect()->route('customer.login');
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
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        $orders = Order::with('customer')
            ->with('order_detail')
            ->where('customer_id','=', $customer_id)
            ->orderBy('id', 'desc')
            ->paginate(6)
            ->withQueryString();

        return view('customer.profile.history_order', [
            'customer' => $customer,
            'orders' => $orders,
        ]);

    }

    public function editPassword(){

    }

    public function updatePassword(){

    }

    public function contact(){
        return view('customer.contact.form');
    }

}
