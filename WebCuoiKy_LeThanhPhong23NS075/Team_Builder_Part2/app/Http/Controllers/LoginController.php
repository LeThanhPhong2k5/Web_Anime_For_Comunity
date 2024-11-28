<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        if($validator->passes()) {
            
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('account.main')->with('success', 'Đăng nhập thành công');
            } else {
                return redirect()->route('account.login')->with('error', 'Tài khoản Email hoặc mật khẩu không đúng');
            }


        }else{
            return redirect()->route('account.login')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function main() {

    }

    public function register() {
        return view('DangKy');
    }

    public function processRegister(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|valid_domain',
            'password' => 'required|min:8|confirmed|regex:/[A-Z]/|regex:/[0-9]/',
            'password_confirmation' => 'required'
        ]);

        if($validator->passes()) {
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'user';
            $user->save();

            return redirect()->route('account.login')->with('success', 'Bạn đã đăng ký thành công');

        }else{
            return redirect()->route('account.DangKy')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('account.login'); 
    }

}
