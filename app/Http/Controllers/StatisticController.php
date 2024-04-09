<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(){
        return view('admin.statistic.index');
    }
    //

    public function sales( Request $request){
        //Lấy giá trị được search về với điều kiện $_GET['search'] tồn tại
        if($request->input('month') != null) {
            $month = $request->input('month');
            //Query để lấy dữ liệu từ bảng classes trên db về
            $result = OrderDetail::selectRaw('SUM(quantity) as total_sales')
                ->with(['order' => function ($query) {
                    $query->select('date_buy');
                }])->select('id')
                ->where('date_buy', 'LIKE', $month)
                ->groupBY('date_buy')
                ->withQueryString();
        }else{

            $result = OrderDetail::selectRaw('SUM(quantity) as total_sales')
                ->with(['order' => function ($query) {
                    $query->select('date_buy');
                }])->select('id')
                ->groupBY('date_buy')
                ->withQueryString();
        }

        $amount[] = $result['quantity'];
        $date_buy[] = $result['date_buy'];

        return view('admin.statistic.sales', compact('amount', 'date_buy'));
    }

    public function sales_monthly(){

    }

    public function sales_yearly(){

    }

    public function product(){

    }

    public function today(){

    }
}
