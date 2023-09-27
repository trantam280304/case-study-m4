<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    // Phần hiển thị chung
    public function index(Request $request)
    {
        // Phân trang và tìm kiếm
        $products = Product::with('category')->paginate(2);
        if (isset($request->keyword)) {
            $keyword = $request->keyword;
            $products = Product::where('name', 'like', "%$keyword%")
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
        // truyền compact 
        return view('admin.products.index', compact('products','successMessage'));
    }
    public function create()
    {
        // khai báo biến categories
        $categories = Category::get();
        return view('admin.products.create',compact('categories'));
    }
    public function store(ProductRequest $request)
    {

        $products = new Product();
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->description   = $request->description;
        $products->quantity = $request->quantity;
        $products->status = $request->status;
        $products->category_id = $request->category_id;
        // Xử lý ảnh
        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
            $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
            $extension = $request->file($fieldName)->getClientOriginalExtension();
            $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
            $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
            $path = str_replace('public/', '', $path);
            $products->image = $path;
        }


        $products->save();
        $request->session()->flash('successMessage', 'More success');
        return redirect()->route('products.index');
    }
    // Chỉnh sửa
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::get();

        return view('admin.products.edit', compact('products','categories'));
    }
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->price = $request->price;
        $products->description   = $request->description;
        $products->quantity = $request->quantity;
        $products->status = $request->status;
        $products->category_id = $request->category_id;
         // Xử lý ảnh
         $fieldName = 'image';
         if ($request->hasFile($fieldName)) {
             $fullFileNameOrigin = $request->file($fieldName)->getClientOriginalName();
             $fileNameOrigin = pathinfo($fullFileNameOrigin, PATHINFO_FILENAME);
             $extension = $request->file($fieldName)->getClientOriginalExtension();
             $fileName = $fileNameOrigin . '-' . rand() . '_' . time() . '.' . $extension;
             $path = 'storage/' . $request->file($fieldName)->storeAs('public/images', $fileName);
             $path = str_replace('public/', '', $path);
             $products->image = $path;
         }
        $products->save();
        $request->session()->flash('successMessage1', 'Update successful');
        return redirect()->route('products.index');
    } 
    // Xóa
    public function destroy( Request $request,$id)
    {
        $products = Product::find($id);
        $products->delete();
        $request->session()->flash('successMessage2', 'Deleted successfully');
        return redirect()->route('products.index');
    }

    // Xem
    public function show($id)
    {
        $products = Product::find($id);
        return view('admin.products.show', compact('products'));
    }
}
