<?php

namespace App\Http\Controllers;

use App\Models\Order;

use App\Models\Category;
use App\Models\Customer;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ShopController extends Controller
{
    // đăng ký
    public function register()
    {
        return view('shop.loginlogout.register');
    }
    public function checkRegister(Request $request)
    {
        $successMessage = '';
        if ($request->session()->has('successMessage')) {
            $successMessage = $request->session()->get('successMessage');
        } elseif ($request->session()->has('successMessage1')) {
            $successMessage = $request->session()->get('successMessage1');
        } elseif ($request->session()->has('successMessage2')) {
            $successMessage = $request->session()->get('successMessage2');
        }
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
            $request->session()->flash('successMessage3', 'Đăng ký thành công');

            return redirect()->route('login.index', compact('successMessage'));
        } else {
            return redirect()->route('login-index')->with($notification);
        }
    }


    // login
    public function indexlogin()
    {
        return view('shop.loginlogout.login');
    }
    public function checklogin(Request $request)
    {
        $successMessage = '';
        if ($request->session()->has('successMessage')) {
            $successMessage = $request->session()->get('successMessage');
        } elseif ($request->session()->has('successMessage1')) {
            $successMessage = $request->session()->get('successMessage1');
        } elseif ($request->session()->has('successMessage2')) {
            $successMessage = $request->session()->get('successMessage2');
        }
        $arr = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('customers')->attempt($arr)) {
            $request->session()->flash('successMessage1', 'Đăng nhập thành công');

            return redirect()->route('shop.layoutmaster');
        } else {
            return redirect()->route('login.index', compact('successMessage'));
        }
    }


    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $successMessage = '';
        if ($request->session()->has('successMessage')) {
            $successMessage = $request->session()->get('successMessage');
        } elseif ($request->session()->has('successMessage1')) {
            $successMessage = $request->session()->get('successMessage1');
        } elseif ($request->session()->has('successMessage2')) {
            $successMessage = $request->session()->get('successMessage2');
        }
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('successMessage2', 'Đăng xuất thành công');
        return redirect()->route('shop.layoutmaster', compact('successMessage'));
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
            $view = view('shop.product_home', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        $param = [
            'products' => $products,
        ];
        return view('shop.home', $param);
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

        if (isset($cart[$id])) {
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
        if ($request->id && $request->quantity) {
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
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
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

    public function order(Request $request)
    {
        if ($request->product_id == null) {
            return redirect()->back();
        } else {
            $id = Auth::guard('customers')->user()->id;
            $data = Customer::find($id);
            $data->address = $request->address;
            $data->email = $request->email;
            $data->phone = $request->phone;


            $data->save();

            $order = new Order();
            $order->customer_id = Auth::guard('customers')->user()->id;
            $order->date_at = date('Y-m-d H:i:s');
            $order->date_ship =  date('Y-m-d H:i:s');
            $order->note = 'chuyển nhanh cho tôi';

            $order->save();
        }
        $count_product = count($request->product_id);
        for ($i = 0; $i < $count_product; $i++) {
            $orderItem = new OrderDetail();
            $orderItem->order_id =  $order->id;
            $orderItem->product_id = $request->product_id[$i];
            $orderItem->quantity = $request->quantity[$i];
            $orderItem->total = $request->total[$i];
            $orderItem->save();
            session()->forget('cart');
            DB::table('products')
                ->where('id', '=', $orderItem->product_id)
                ->decrement('quantity', $orderItem->quantity);
        }
        $notification = [
            'message' => 'success',
        ];


        return redirect()->route('shop.layoutmaster')->with($notification);;
    }
}
