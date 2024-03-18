<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function showProduct()
    {

        $categories = Category::all();
        $ages = Age::all();

        $products = Product::with('age')
            ->with('category')
            ->simplePaginate(6);

        return view('customer.pages.index', [
            'products' => $products,
            'ages' => $ages,
            'categories' => $categories
        ]);
    }
}
