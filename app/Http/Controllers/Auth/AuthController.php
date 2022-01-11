<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;



use App\Models\User;

class AuthController extends Controller
{
    // -------------------- 新規登録ページ表示 -------------------- //
    public function getRegister()
    {
        return view('register');
    }

    // -------------------- 新規登録処理 -------------------- //
    public function postRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('status','会員登録完了しました！');

    }

    // -------------------- ログイン画面表示 -------------------- //
    public function getLogin()
    {
        return view('login');

    }

    // -------------------- ログイン処理 -------------------- //
    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('getIndex')->with('status','お疲れ様です！');
        }
        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }

    // -------------------- ログアウト処理 -------------------- //
    public function postLogout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('getLogin')->with('logout','ログアウトしました！');
        }

}
