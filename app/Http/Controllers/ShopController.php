<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ShopController extends Controller
{
    // đăng ký
    public function register(){
        return view('shop.loginlogout.register');
    }
    public function checkRegister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|unique:customers|email',
            'password' => 'required|min:6',
        ]);
        $notifications = [
            'ok' => 'ok',
        ];
        $notification = [
            'message' => 'error',
        ];
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->address =  $request->address;
        $customer->email = $request->email;
        $customer->phone = $request->phone;

        $customer->password = bcrypt($request->password);
        if ($request->password == $request->psw_repeat) {
            $customer->save();
            return redirect()->route('login.index');
        } else {
            return redirect()->route('login-index')->with($notification);
        }
    }


    // login
    public function checklogin(Request $request)
    {
        // dd(123);
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            return redirect()->route('shop.layoutmaster');
        } else {
            return redirect()->route('login.index');
        }
    }
    
    public function indexlogin()
    {
        return view('shop.loginlogout.login');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('shop.layoutmaster');
    }
    
    

  // xem chi tiết     
    public function detail($id)
    {
        $product = Product::find($id);
        // Lấy các sản phẩm có liên quan (ví dụ: cùng danh mục)
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '<>', $product->id) // Loại bỏ sản phẩm hiện tại
            ->inRandomOrder() // Sắp xếp ngẫu nhiên
            ->get();
        return view('shop.detail', compact('product', 'relatedProducts'));
    }

    public function shop(Request $request)
    {
        $products = Product::paginate(4);
        if ($request->ajax()) {
            $view = view('shop.product_home',compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        $param = [
            'products' => $products,
        ];
        return view('shop.home',$param);
    }
    


    // cart
     /**
     * Write code on Method
     *
     
  
  
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        return view('shop.cart');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $products = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $products->name,
                "quantity" => 1,
                "price" => $products->price,
                "image" => $products->image
                
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    // checkout
    public function checkout()
    {
        return view('shop.checkout');
    }

    
   
}
