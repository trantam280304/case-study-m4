<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use App\Models\Category;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    // Phần hiển thị chung
    public function index(Request $request)
    {
        try{
        $this->authorize('viewAny', User::class);
        // Phân trang và tìm kiếm
        $categories = Category::paginate(2);
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $categories = Category::where('name', 'like', "%$keyword%")
                ->paginate();
        }
        // thông báo
        $successMessage = '';
        if ($request->session()->has('successMessage')) {
            $successMessage = $request->session()->get('successMessage');
        } elseif ($request->session()->has('successMessage1')) {
            $successMessage = $request->session()->get('successMessage1');
        } elseif ($request->session()->has('successMessage2')) {
            $successMessage = $request->session()->get('successMessage2');
        }
        return view('admin.categories.index', compact('categories','successMessage'));
        } catch (\Exception $e) {
            $notification = [
                'updategroup' => 'Chỉnh Sửa Thành Công!',
            ];
            return back();
        }  
    }
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('admin.categories.create');
    }
    // Xử lý thêm thì phải có Request
    public function store(CategoryRequest $request)
    {
        $this->authorize('create', Category::class);
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
        $request->session()->flash('successMessage', 'More success');
        return redirect()->route('categories.index')->with('status', 'Thêm danh mục thành công');
        //  return redirect()->route('categories.index');

    }
    // Chỉnh sửa
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit', compact(['categories']));
       
    }
   

    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->delete_at = $request->delete_at;

        $categories->save();
        $request->session()->flash('successMessage1', 'Update successful');
        return redirect()->route('categories.index');
    }


    // Xóa
    public function destroy( Request $request ,$id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        $request->session()->flash('successMessage2', 'Deleted successfully');
        return redirect()->back()->with('status', 'Xóa danh mục thành công');
    }

    // Xem
    public function show($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.show', compact('categories'));
    }

    // xoa thung rac
    public  function softdeletes($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $category = Category::findOrFail($id);
        $category->deleted_at = date("Y-m-d h:i:s");
        $category->save();
        return redirect()->route('categories.index');
    }

    public  function trash()
    {
        $categories = Category::onlyTrashed()->get();
        $param = ['categories'    => $categories];
        return view('admin.categories.trash', $param);
    }
    // khôi phục xóa 
    public function restoredelete($id)
    {
        $categories = Category::withTrashed()->where('id', $id);
        $categories->restore();
        return redirect()->route('categories.trash');
    }
    // chuyển đổi ngôn ngữ
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}
