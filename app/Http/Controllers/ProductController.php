<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Age;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //show all products
    public function index()
    {

        $categories = Category::all();
        $ages = Age::all();

        $products = Product::with('age')
        ->with('category')
        ->paginate(5);

        return view('admin.products_manage.index', [
            'products' => $products,
            'ages' => $ages,
            'categories' => $categories
        ]);
    }


    public function addProduct()
    {
        $ages = Age::all();
        $categories = Category::all();

        return view('admin.products_manage.create', [
            'ages' => $ages,
            'categories' => $categories
        ]);
    }

    public function storeProduct(Request $request)
    {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);

        $array = [];
        $array = Arr::add($array, 'name', $request->name);
        $array = Arr::add($array, 'size', $request->size);
        $array = Arr::add($array, 'pieces', $request->pieces);
        $array = Arr::add($array, 'insiders_points', $request->insiders_points);
        $array = Arr::add($array, 'items', $request->items);
        $array = Arr::add($array, 'description', $request->description);
        $array = Arr::add($array, 'category_id', $request->category_id);
        $array = Arr::add($array, 'age_id', $request->age_id);
        $array = Arr::add($array, 'price', $request->price);
        $array = Arr::add($array, 'quantity', $request->quantity);
        $array = Arr::add($array, 'image', $imageName);

        Product::create($array);

        return Redirect::route('product.index');
    }

    public function edit(Product $product)
    {
        $ages = Age::all();
        $categories = Category::all();
        //Gọi đến view để sửa
        return view('admin.products_manage.edit', [
            'product' => $product,
            'ages' => $ages,
            'categories' => $categories
        ]);

    }

    public function update(Request $request, Product $product)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();

            // Lưu ảnh vào thư mục public/images
            $image->move(public_path('images'), $imageName);
        }else{
            $imageName = $product -> image;
        }

        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'name', $request->name);
        $array = Arr::add($array, 'size', $request->size);
        $array = Arr::add($array, 'pieces', $request->pieces);
        $array = Arr::add($array, 'insiders_points', $request->insiders_points);
        $array = Arr::add($array, 'items', $request->items);
        $array = Arr::add($array, 'description', $request->description);
        $array = Arr::add($array, 'category_id', $request->category_id);
        $array = Arr::add($array, 'age_id', $request->age_id);
        $array = Arr::add($array, 'price', $request->price);
        $array = Arr::add($array, 'quantity', $request->quantity);
        $array = Arr::add($array, 'image', $imageName);

        $product->update($array);

        //Quay về danh sách
        return Redirect::route('product.index');
    }

    public function destroy( Product $product){
        //Xóa bản ghi được chọn
        $product->delete();
        //Quay về danh sách
        return Redirect::route('product.index');
    }



//    CART MANAGE

    public function showCart(){

    }

    public function addToCart(int $id){
        $product = Product::with('age')
            ->with('category')
            ->where('id', $id)
            ->first();
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

        return Redirect::route('index');

    }


    public function updateCart(){

    }

    public function deleteFromCart(){

    }

    public function deleteAllFromCart(){

    }
}
