<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }
        public function login(Request $request)
        {
            $credentials = $request->only('username', 'password');

            if (Auth::attempt($credentials)) {
                // Xác thực thành công
                $user = Auth::user();
                // Lưu trạng thái đăng nhập vào Session
                session()->put('user', $user->username);
                // Flash thông báo chào mừng
                session()->flash('message', 'Xin chào, ' . $user->username . '!');
                return redirect()->route('product.index');
            } else {
                // Xác thực thất bại
                return redirect()->route('login')->with('error', 'Đăng nhập thất bại');
            }
        }
    public function welcome()
    {
        if(session::exists('user')){
            return view('welcome');
        }
        else{
            return view('login');
        }
    }
    public function logout()
    {
        // Xóa thông tin đăng nhập khỏi Session
        Session::forget('user');
        return redirect('/login');
    }
    public function regenerateSession()
    {
        // Tạo lại ID của phiên
        Session::regenerate();
        return redirect('/welcome');
    }
}
