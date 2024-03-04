<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    //show all products
    public function index()
    {

        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::with('brand')
        ->with('category')
        ->paginate(6);

        return view('admin.products_manage.index', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories
        ]);
    }


    public function addProduct()
    {
        $brands = Brand::all();
        $data_brand['brands'] = $brands;

        $categories = Category::all();
        $data_category['categories'] = $categories;

        return view('admin.products_manage.create', $data_brand, $data_category);
    }

    public function storeProduct(Product $products, Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->material = $request->material;
        $product->size = $request->size;
        $product->color = $request->color;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $request->image;

        $products->save();

        return view('admin.products_manage.index', [
            'products' => $products
        ]);
    }

    public function edit(Product $product, Request $request)
    {
        //Lấy brand, category
        $brands = Brand::all();
        $categories = Category::all();

        //Gọi đến view để sửa
        return view('admin.products.index', [
            'product' => $product
        ]);

    }

    public function update(UpdateProductRequest $request, Product $product)
    {

        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'name', $request->name);
        $array = Arr::add($array, 'material', $request->material);
        $array = Arr::add($array, 'color', $request->color);
        $array = Arr::add($array, 'description', $request->description);
        $array = Arr::add($array, 'size', $request->size);
        $array = Arr::add($array, 'category_id', $request->category_id);
        $array = Arr::add($array, 'brand_id', $request->brand_id);
        $array = Arr::add($array, 'price', $request->price);
        $array = Arr::add($array, 'quantity', $request->quantity);

        $product->update($array);
        //Quay về danh sách
        return Redirect::route('admin.product');
    }

    public function delete( Product $product, Request $request ){
        //Xóa bản ghi được chọn
        $product->delete();
        //Quay về danh sách
        return Redirect::route('products.index');
    }

}
