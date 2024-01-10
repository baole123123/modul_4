<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        // if (Auth::check()) {
        //     return redirect()->route('home');
        // } else {
            return view('auth.login');
        // }
    }

    public function postLogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email không đúng",
            "password.exists" => "Mật khẩu không đúng",
        ];
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email',
            'password' => 'exists:users,password',
        ], $messages);
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->route('categorie.index');
        } else {
            return back()->withErrors($validator)->withInput();
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function checklogin(Request $request)
    {
        $messages = [
            "email.exists" => "Email không đúng",
            "password.exists" => "Mật khẩu không đúng",
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('token'))) {
            return redirect()->route('products.index')->with('successMessage', 'Đăng nhập thành công');
        }

        return back()->withErrors(['password' => 'Email hoặc mật khẩu không đúng'])->withInput();
    }

    public function forgetPass()
    {
        return view('auth.forgetPass');
    }
    public function postForgetPass(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:users,email',
        ], [
            'email.required' => 'Vui lòng nhập địa chỉ Email hợp lệ',
            'email.exists' => 'Email này không tồn tại trong hệ thống'
        ]);

        $token = strtoupper(Str::random(10));
        $user = User::where('email', $req->email)->first();
        $user->token = $token; // Cập nhật trường 'token'
        $user->save(); // Lưu vào CSDL

        Mail::send('auth.check_email_forget', compact('user'), function ($email) use ($user) {
            $email->subject('4MaticShop - lấy lại mật khẩu tài khoản');
            $email->to($user->email, $user->name);
        });

        return redirect()->back()->with('successMessage', 'Vui lòng kiểm tra email để lấy lại mật khẩu');
    }

    public function getPass(User $user, $token)
    {
        if($user->token === $token){
            return view('auth.getPass');
        }
        return redirect()->back()->with('successMessage', 'Cập nhật mật khẩu thành công');
    }


    public function postGetPass(User $user, $token, Request $req)
    {
        $req->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ], [
            'password.required' => 'Vui lòng điền mật khẩu',
            'confirm_password.required' => 'Vui lòng điền mật khẩu xác nhận',
            'confirm_password.same' => 'Mật khẩu xác nhận không đúng',
        ]);
        $password_h = Hash::make($req->password);
        $user->update(['password' => $password_h, 'token' => null]);
        return redirect()->route('login')->with('successMessage' , 'Đặt lại mật khẩu thành công');
    }
}
