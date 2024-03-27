<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Customer;

use App\Http\Requests\UpdateOrderRequest;
use App\Http\Requests\StoreOrderRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function editOrder(int $id)
    {
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        $order = Order::with('customer')
            ->where('id','=', $id)
        ->first();

        $order_details = OrderDetail::with('product')
            ->with('order')
            ->where('order_id', '=', $id)
            ->get();

        return view('admin.order_manage.edit_order', [
            'customer' => $customer,
            'order' => $order,
            'order_details' => $order_details,
        ]);

    }

    public function updateOrder(UpdateOrderRequest $request, Order $order) {
        $selectedValue = $request->input('status');
        $array = [];
        $array = Arr::add($array, 'status', $selectedValue);
        $order->update($array);
//
//        dd($selectedValue);

        return Redirect::route('order.index')->with('success', 'Edit an order successfully!');
    }

    public function checkout()
    {
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        return view('customer.cart.checkout', [
            'customer' => $customer,
        ]);
    }

    public function checkoutProcess(StoreOrderRequest $request){
        //date mua hang
        $dateBuy = date("Y-m-d H:i:s");

        //lay status (status mac dinh la 0 tuong ung trang thai xac nhan don hang)
        $status = 0;

        //customer id
        $customerId = Auth::guard('customer')->id();

        $array = [];
        $array = Arr::add($array, 'date_buy', $dateBuy);
        $array = Arr::add($array, 'status', $status);
        $array = Arr::add($array, 'receiver_name', $request->receiver_name);
        $array = Arr::add($array, 'receiver_phone', $request->receiver_phone);
        $array = Arr::add($array, 'receiver_address', $request->receiver_address);
        $array = Arr::add($array, 'customer_id', $customerId);
        $array = Arr::add($array, 'payment_method', 1);
        Order::create($array);

        $maxOrderId = Order::get()
            ->where('customer_id', $customerId)->max('id');

        //lay du lieu de insert vao bang order_details
        foreach(Session::get('cart') as $product_id => $product) {
            $orderDetails = [];
            $orderDetails = Arr::add($orderDetails, 'order_id', $maxOrderId);
            $orderDetails = Arr::add($orderDetails, 'product_id', $product_id);
            $orderDetails = Arr::add($orderDetails, 'price', $product['price']);
            $orderDetails = Arr::add($orderDetails, 'quantity', $product['quantity']);

            $productQuantity = Product::find($product_id);
            $productQuantity->quantity -= $product['quantity'];
            $productQuantity->save();
            OrderDetail::create($orderDetails);
        }
//        dd($array, $maxOrderId , $orderDetails);
        Session::forget('cart');

        return Redirect::route('payment');
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
            ->orderBy('id', 'desc')
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

    public function orderDetail(int $id){
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);
        $order = Order::with('customer')
            ->where('id','=', $id)
            ->first();

        $order_details = OrderDetail::with('product')
            ->with('order')
            ->where('order_id', '=', $id)
            ->get();

        return view('customer.profile.history_order_detail', [
            'customer' => $customer,
            'order' => $order,
            'order_details' => $order_details,
        ]);

    }

    public function payment(){
        $customer_id = Auth::guard('customer')->id();
        $customer = Customer::find($customer_id);

        $maxOrderId = Order::max('id');

        $order = Order::with('customer')
            ->where('customer_id','=', $customer_id)
            ->where('id', '=', $maxOrderId)
            ->first();

        $order_details = OrderDetail::with('product')
            ->with('order')
            ->where('order_id', '=', $maxOrderId)
            ->get();

        return view('customer.payment.index', [
            'customer' => $customer,
            'order' => $order,
            'order_details' => $order_details,
        ]);

    }
}
