<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function showSalesDaily (){

        $order_details = DB::table('order_details')
            ->join('orders', 'order_details.order_id','=', 'orders.id')
            ->select('order_details.quantity', 'orders.date_buy')
            ->get();

        return view('admin.homepage.statistic.sales', [
            'order_details' => $order_details
        ]);

    }
}
