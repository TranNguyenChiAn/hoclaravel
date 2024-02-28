<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    //show all products
    public function index()
    {
        $orderBy = "id";
        $orderDirection = "desc";

        $categories = Category::all();
        $brands = Brand::all();


        $products = DB::table('products')
            ->join('categories', 'products.category_id','=', 'categories.id')
            ->join('brands', 'products.brand_id', '=','brands.id')
            ->select('products.*', 'categories.name AS category_name', 'brands.name AS brand_name')
            ->orderBy($orderBy, $orderDirection)
            ->paginate(5);

        return view('admin.products_manage.index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
            ]);
    }


    public function show(int $id)
    {
        $product = DB::table('products')
            ->join('brands', 'products.producer_id', 'brands.id')
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'brands.brand_name', 'categories.name')
            ->where('products.id', '=', $id)
            ->first();

        $product = Product::where('id', $id)->first();

        return view('customers.clothes_manage.show', [
            'product' => $product
        ]);
    }

    public function addProduct(){
        $brands = Brand::all();
        $data_brand['brands'] = $brands;

        $categories = Category::all();
        $data_category['categories'] = $categories;

        return view('admin.products_manage.create',$data_brand,$data_category);
    }

    public function storeProduct(Product $products, Request $request){
        $product = new Product;
        $product->name = $request->name;
        $product-> material = $request->material;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $request->image;

        $products->save();

        return view('admin.products_manage.index',[
        'products' => $products
        ]);
    }

    public function cart()
    {
        return view('customers.products.index');
    }

    public function addToCart(Product $product)
    {
//        neu da co cart
        if (Session::exists('cart')) {
//            lay cart hien tai
            $cart = Session::get('cart');
//            neu san pham da co trong cart => +1 so luong
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
            } else {
//                them sp vao cart
                $cart = Arr::add($cart, $product->id, [
                    'image' => $product->image,
                    'product_name' => $product->product_name,
                    'price' => $product->price,
                    'quantity' => 1
                ]);
            }
        } else {
//            tao cart moi
            $cart = array();
            $cart = Arr::add($cart, $product->id, [
                'image' => $product->image,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1
            ]);
        }
//        nem cart len session
        Session::put(['cart' => $cart]);

        return Redirect::route('product');
    }

    public function updateCartQuantity(int $id, Request $request)
    {
        //        lay cart hien tai
        $cart = Session::get('cart');
//        cap nhat so luong
        $cart[$id]['quantity'] = $request->buy_quantity;
        //        cap nhat cart moi
        Session::put(['cart' => $cart]);
        return Redirect::back();
    }

    public function deleteFromCart(Request $request)
    {
//        lay cart hien tai
        $cart = Session::get('cart');
//        xoa id cua product can xoa
        Arr::pull($cart, $request->id);
//        cap nhat cart moi
        Session::put(['cart' => $cart]);

        return Redirect::back();
    }

    public function deleteAllFromCart()
    {
//       xoa cart
        Session::forget('cart');

        return Redirect::back();
    }

    public function checkout()
    {
        return view('customers.products.checkout');
    }
}
