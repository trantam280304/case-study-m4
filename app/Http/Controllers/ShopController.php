<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
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
    
    public function layoutmaster()
    {
        return view('shop.home');
    }
}
