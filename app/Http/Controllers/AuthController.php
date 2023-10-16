<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('products.index');
        } else {
            $successMessage = '';
            if ($request->session()->has('successMessage')) {
                $successMessage = $request->session()->get('successMessage');
            } elseif ($request->session()->has('successMessage1')) {
                $successMessage = $request->session()->get('successMessage1');
            } elseif ($request->session()->has('successMessage2')) {
                $successMessage = $request->session()->get('successMessage2');
            }
            return view('admin.loginlogout.login', compact('successMessage'));
        }
    }
    public function postLogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email không đúng",
            "email.required" => "Email không được để trống",
            "password.exists" => "Mật khẩu không đúng",
            "password.required" => "Mật khẩu  không được để trống",

        ];
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->flash('successMessage2', 'đăng nhập thành công');
            return redirect()->route('products.index');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginadmin');
    }
}
