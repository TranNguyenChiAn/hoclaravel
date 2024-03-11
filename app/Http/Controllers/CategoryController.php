<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;


class CategoryController extends Controller
{
    //trang index
    public function show()
    {
        //Lấy dữ liệu từ bảng
        $categories = Category::get()->sortBy('id')->all();

        //Trả lại view
        return view('admin.category_manager.index', [
            'categories' => $categories
        ]);
    }

    public function addCategory()
    {
        $categories = Category::all();
        return view('admin.category_manager.create', [
            'categories' => $categories
        ]);
    }

    public function storeCategory(Request  $request)
    {
            $array = [];
            $array = Arr::add($array, 'name', $request->name);
            //Lấy dữ liệu từ form và lưu lên db
            Category::create($array);
            return Redirect::route('category.index');
    }

    public function editCategory(Category $category, Request $request)
    {
        //Gọi đến view để sửa
        return view('admin.category_manager.edit', [
            'category' => $category
        ]);
    }

    public function updateCategory(UpdateCategoryRequest $request, Category $category)
    {
        $array = [];
        $array = Arr::add($array, 'name', $request->name);

        $category->update($array);

        return Redirect::route('category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return Redirect::route('category.destroy');

    }

}
