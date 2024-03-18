<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{

    public function checkout(){

    }

    public function checkoutProcess(){

    }

    public function index(Request $request)
    {
        //search
        $search = "";
        if (isset($request->search)) {
            $search = $request->search;
        }


        $customer = Customer::all('id')->toArray();
        if (isset($request->customer)) {
            $customer = $request->customer;
        }

        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.*', 'customers.name AS customer_name')
            ->whereIn('customer_id', $customer)
            ->where('customers.name', 'like', '%' . $search . '%')
            ->paginate(6)
            ->withQueryString();


        $customers = Customer::all();

        return view('admin.order_manage.index', [
            'orders' => $orders,
            'customers' => $customers,
            'search' => $search,
            'f_customer' => $customer,
        ]);
    }

    public function orderDetail(){

    }
}
