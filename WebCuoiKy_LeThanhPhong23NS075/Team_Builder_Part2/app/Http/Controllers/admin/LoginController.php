<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataAnime;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    
    //Xác minh cho tài khoản admin
    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->passes()) {
            
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) 
            {   
                if(Auth::guard('admin')->user()->role != "admin")
                {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'Bạn không phải là người để truy cập vào trang này');
                }

                $user = Auth::guard('admin')->user(); 
                $request->session()->put('login_id', $user->id);  

                return redirect('admin/admin_page');
            } else {
                return back()->with('error', 'Tài khoản Email hoặc mật khẩu không đúng');
            }


        }else{
            return redirect()->route('admin.login')
                ->withInput()
                ->withErrors($validator);
        }
    }
    public function index() {
        return view('admin.login');
    }

    public function pageAdmin() {
        $data = array();
        if(Session::has('login_id')) {
            $data = User::where('id','=', Session::get('login_id'))->first();
        }
        return view('admin.PageAdmin.admin_page', compact('data'));
    }
    //Change tab
    public function tabForm() {
        $data = array();
        if(Session::has('login_id')) {
            $data = User::where('id','=', Session::get('login_id'))->first();
        }
        return view('admin.PageAdmin.form', compact('data'));
    }
    public function tabTable() {
        $data = array();
        if(Session::has('login_id')) {
            $data = User::where('id','=', Session::get('login_id'))->first();
        }
        $animes = DataAnime::all(); 
        return view('admin.PageAdmin.table', compact('data','animes'));
    }

    public function logout() {
        if(Session::has('login_id')) {
            Session::pull('login_id');
            return redirect('admin/login');
        }
        
    }
}
