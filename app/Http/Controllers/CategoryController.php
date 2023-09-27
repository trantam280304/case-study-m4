<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
    // Phần hiển thị chung
    public function index(Request $request)
    {
        // Phân trang và tìm kiếm
            $categories = Category::paginate(2);
            if(isset($request->keyword)){
                $keyword = $request->keyword;
                $categories = Category::where('name', 'like', "%$keyword%")
                    ->paginate();
            }
            return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('admin.categories.create');
    }
     // Xử lý thêm thì phải có Request
     public function store(CategoryRequest $request)
     {
        // $validated = $request->validate(
        //     [
        //         'name' => ['required', 'unique:categories', 'max:5'],
        //     ],
        //     [
        //         'name.required' => 'Không được để trống',
        //         'name.unique' => 'Tên đã tồn tại',
        //         'name.max' => 'Tên không được vượt quá 5 ký tự',
        //     ]
        // );
         $categories = new Category();
         $categories->name = $request->name;
         $categories->delete_at = $request->delete_at;


       
         $categories->save();
         return redirect()->route('categories.index')->with('status', 'Thêm danh mục thành công');
        //  return redirect()->route('categories.index');

     }
     // Chỉnh sửa
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->delete_at = $request->delete_at;

        $categories->save();
        return redirect()->route('categories.index');
    }


     // Xóa
     public function destroy($id)
     {
         $categories = Category::find($id);
         $categories->delete();
         return redirect()->route('categories.index');
     }
 
     // Xem
     public function show($id)
     {
         $categories = Category::find($id);
         return view('admin.categories.show', compact('categories'));
     }
}
