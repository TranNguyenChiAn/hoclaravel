<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(){
        $admin = DB::table('admins')
            ->select('admins.*')
            ->get();


        return view('admin.account.index', [
            'admin' => $admin
        ]);
    }

}
