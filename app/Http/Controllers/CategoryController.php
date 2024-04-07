<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


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
        return view('admin.category_manager.create');
    }

    public function storeCategory(Request  $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','regex:/^[a-zA-Z]/'],

        ], [
            'name.required' => 'Category name is required',
            'name.regex' => 'Category name is not correct format. Text only',
        ]);

        if($validator->fails()){
            return redirect()->route('category.create')->withErrors($validator)->withInput();
        }
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
        $validator = Validator::make($request->all(), [
            'name' => ['required','regex:/^[a-zA-Z]/'],

        ], [
            'name.required' => 'Category name is required',
            'name.regex' => 'Category name is not correct format. Text only',
        ]);

        if($validator->fails()){
            return redirect()->route('category.edit', $category)->withErrors($validator)->withInput();
        }

        $array = [];
        $array = Arr::add($array, 'name', $request->name);

        $category->update($array);

        return Redirect::route('category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return Redirect::route('category.index');

    }

}
